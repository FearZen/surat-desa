<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nomor_surat
 * @property string|null $nomor_register
 * @property int $template_id
 * @property int $penduduk_id
 * @property string $tanggal_surat
 * @property string $isi_surat
 * @property string $status
 * @property int $dibuat_oleh
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $pembuat
 * @property-read \App\Models\Penduduk $penduduk
 * @property-read \App\Models\Template $template
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereDibuatOleh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereIsiSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereNomorRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereNomorSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat wherePendudukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereTanggalSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Surat extends Model
{
    protected $fillable = [
        'nomor_surat', 'nomor_register', 'template_id', 'penduduk_id',
        'tanggal_surat', 'isi_surat', 'status', 'dibuat_oleh',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }
}
