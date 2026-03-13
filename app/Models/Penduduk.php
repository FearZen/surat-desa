<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nik
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $rt
 * @property string $rw
 * @property string $pekerjaan
 * @property string $agama
 * @property string $status_perkawinan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Surat> $surats
 * @property-read int|null $surats_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereRt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereRw($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereStatusPerkawinan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penduduk whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Penduduk extends Model
{
    protected $fillable = [
        'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
        'alamat', 'rt', 'rw', 'pekerjaan', 'agama', 'status_perkawinan',
    ];

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}
