<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'template_id' => 'required|exists:templates,id',
            'penduduk_id' => 'required|exists:penduduks,id',
            'tanggal_surat' => 'required|date',
            'isi_surat' => 'nullable|string',
            'nomor_surat' => 'nullable|string|max:255',
            'nomor_register' => 'nullable|string|max:255',
            'status' => 'nullable|string|in:draft,selesai',
        ];
    }
}
