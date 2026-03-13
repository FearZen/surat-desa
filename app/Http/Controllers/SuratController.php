<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratRequest;
use App\Models\ActivityLog;
use App\Models\Penduduk;
use App\Models\Surat;
use App\Models\Template;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $query = Surat::with(['template', 'penduduk', 'pembuat']);

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->whereHas('penduduk', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            })->orWhere('nomor_surat', 'like', "%{$search}%");
        }

        if ($request->has('template_id')) {
            $query->where('template_id', $request->template_id);
        }

        if ($request->has('tanggal')) {
            $query->whereDate('tanggal_surat', $request->tanggal);
        }

        $surats = $query->latest()->paginate(10);
        $templates = Template::all();

        return view('surat.index', compact('surats', 'templates'));
    }

    public function create(Request $request)
    {
        $templates = Template::all();
        $penduduks = Penduduk::all();
        $nextNomorSurat = $this->generateNomorSurat();

        $selected_template = null;
        $selected_penduduk = null;
        $isi_surat = '';

        if ($request->has('template_id') && $request->has('penduduk_id')) {
            $selected_template = Template::find($request->template_id);
            $selected_penduduk = Penduduk::find($request->penduduk_id);

            if ($selected_template && $selected_penduduk) {
                $isi_surat = $this->parseTemplate($selected_template->isi_template, $selected_penduduk);
            }
        }

        return view('surat.create', compact('templates', 'penduduks', 'selected_template', 'selected_penduduk', 'isi_surat', 'nextNomorSurat'));
    }

    public function store(StoreSuratRequest $request)
    {
        $data = $request->validated();
        
        // Generate automatic fields
        $data['nomor_surat'] = $request->nomor_surat ?? $this->generateNomorSurat();
        $data['dibuat_oleh'] = auth()->id();
        
        // Fetch relations for parsing
        $template = Template::findOrFail($data['template_id']);
        $penduduk = Penduduk::findOrFail($data['penduduk_id']);
        
        // Auto-generate content if not provided
        $data['isi_surat'] = $request->isi_surat ?? $this->parseTemplate($template->isi_template, $penduduk);

        $surat = Surat::create($data);
        ActivityLog::log("Membuat surat: {$surat->nomor_surat} untuk {$surat->penduduk->nama}");

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diterbitkan dan diarsipkan.');
    }

    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    public function edit(Surat $surat)
    {
        return view('surat.edit', compact('surat'));
    }

    public function update(Request $request, Surat $surat)
    {
        $surat->update($request->all());
        ActivityLog::log("Mengedit surat: {$surat->nomor_surat}");

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy(Surat $surat)
    {
        $nomor = $surat->nomor_surat;
        $surat->delete();
        ActivityLog::log("Menghapus surat: {$nomor}");

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }

    public function downloadPdf(Surat $surat)
    {
        $pdf = Pdf::loadView('surat.pdf', compact('surat'));

        $surat->update(['status' => 'dicetak']);
        ActivityLog::log("Mencetak PDF surat: {$surat->nomor_surat}");

        // Sanitize filename to remove slashes
        $safeNomor = str_replace(['/', '\\'], '-', $surat->nomor_surat);
        return $pdf->download("Surat-{$safeNomor}.pdf");
    }

    private function generateNomorSurat()
    {
        $year = date('Y');
        $count = Surat::whereYear('created_at', $year)->count() + 1;
        $paddedCount = str_pad($count, 3, '0', STR_PAD_LEFT);

        return "470/{$paddedCount}/DS/{$year}";
    }

    private function parseTemplate($content, $penduduk)
    {
        $placeholders = [
            '{{ nama }}' => $penduduk->nama,
            '{{ nik }}' => $penduduk->nik,
            '{{ tempat_lahir }}' => $penduduk->tempat_lahir,
            '{{ tanggal_lahir }}' => Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y'),
            '{{ jenis_kelamin }}' => $penduduk->jenis_kelamin,
            '{{ alamat }}' => $penduduk->alamat,
            '{{ pekerjaan }}' => $penduduk->pekerjaan,
            '{{ agama }}' => $penduduk->agama,
            '{{ status_perkawinan }}' => $penduduk->status_perkawinan,
            '{{ rt }}' => $penduduk->rt,
            '{{ rw }}' => $penduduk->rw,
        ];

        return str_replace(array_keys($placeholders), array_values($placeholders), $content);
    }
}
