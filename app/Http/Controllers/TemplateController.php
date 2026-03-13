<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\ActivityLog;
use App\Models\Template;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::latest()->paginate(10);

        return view('template.index', compact('templates'));
    }

    public function create()
    {
        return view('template.create');
    }

    public function store(StoreTemplateRequest $request)
    {
        $template = Template::create($request->validated());
        ActivityLog::log("Membuat template surat: {$template->nama_template}");

        return redirect()->route('template.index')->with('success', 'Template surat berhasil dibuat.');
    }

    public function show(Template $template)
    {
        return view('template.show', compact('template'));
    }

    public function edit(Template $template)
    {
        return view('template.edit', compact('template'));
    }

    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $template->update($request->validated());
        ActivityLog::log("Mengedit template surat: {$template->nama_template}");

        return redirect()->route('template.index')->with('success', 'Template surat berhasil diperbarui.');
    }

    public function destroy(Template $template)
    {
        $nama = $template->nama_template;
        $template->delete();
        ActivityLog::log("Menghapus template surat: {$nama}");

        return redirect()->route('template.index')->with('success', 'Template surat berhasil dihapus.');
    }
}
