<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use App\Models\ActivityLog;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        $query = Penduduk::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('nik', 'like', "%{$search}%");
        }

        $penduduks = $query->latest()->paginate(10);

        return view('penduduk.index', compact('penduduks'));
    }

    public function create()
    {
        return view('penduduk.create');
    }

    public function store(StorePendudukRequest $request)
    {
        $penduduk = Penduduk::create($request->validated());
        ActivityLog::log("Menambah data penduduk: {$penduduk->nama}");

        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    public function show(Penduduk $penduduk)
    {
        return view('penduduk.show', compact('penduduk'));
    }

    public function edit(Penduduk $penduduk)
    {
        return view('penduduk.edit', compact('penduduk'));
    }

    public function update(UpdatePendudukRequest $request, Penduduk $penduduk)
    {
        $penduduk->update($request->validated());
        ActivityLog::log("Mengedit data penduduk: {$penduduk->nama}");

        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
    }

    public function destroy(Penduduk $penduduk)
    {
        $nama = $penduduk->nama;
        $penduduk->delete();
        ActivityLog::log("Menghapus data penduduk: {$nama}");

        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil dihapus.');
    }
}
