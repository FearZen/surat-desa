<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use App\Models\Surat;
use App\Models\Template;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        // 1. Create Templates
        $skDomisili = Template::updateOrCreate(
            ['nama_template' => 'Surat Keterangan Domisili'],
            ['isi_template' => "Yang bertanda tangan di bawah ini Kepala Desa Setia Bakti menerangkan bahwa:\n\nNama: {{ nama }}\nNIK: {{ nik }}\nTempat, Tgl Lahir: {{ tempat_lahir }}, {{ tanggal_lahir }}\nAlamat: {{ alamat }}\n\nAdalah benar penduduk yang berdomisili di Desa Setia Bakti, RT {{ rt }} / RW {{ rw }}. Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya."]
        );

        $skKelahiran = Template::updateOrCreate(
            ['nama_template' => 'Surat Keterangan Kelahiran'],
            ['isi_template' => "Menerangkan bahwa pada hari ini telah lahir seorang anak dari:\n\nNama Orang Tua: {{ nama }}\nNIK: {{ nik }}\nAlamat: {{ alamat }}\n\nDemikian surat ini dibuat agar dapat dipergunakan untuk pengurusan akta kelahiran."]
        );

        $skck = Template::updateOrCreate(
            ['nama_template' => 'Surat Pengantar SKCK'],
            ['isi_template' => "Kepala Desa Setia Bakti menerangkan bahwa:\n\nNama: {{ nama }}\nNIK: {{ nik }}\nAlamat: {{ alamat }}\n\nNama tersebut di atas adalah benar berkelakuan baik dan tidak pernah terlibat tindak pidana di lingkungan kami. Surat ini diberikan untuk keperluan pengurusan SKCK."]
        );

        // 2. Create Residents
        $penduduks = [
            [
                'nik' => '1234567890123456',
                'nama' => 'Budi Sudarsono',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1985-05-15',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Merdeka No. 10',
                'rt' => '001',
                'rw' => '002',
                'pekerjaan' => 'Wiraswasta',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
            ],
            [
                'nik' => '2345678901234567',
                'nama' => 'Siti Aminah',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1990-10-20',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Komplek Permata Blok A',
                'rt' => '003',
                'rw' => '004',
                'pekerjaan' => 'Guru',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
            ],
            [
                'nik' => '3456789012345678',
                'nama' => 'Agus Pratama',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1995-12-01',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Griya Asri No. 5',
                'rt' => '005',
                'rw' => '006',
                'pekerjaan' => 'Karyawan Swasta',
                'agama' => 'Kristen',
                'status_perkawinan' => 'Belum Kawin',
            ],
            [
                'nik' => '4567890123456789',
                'nama' => 'Dewi Lestari',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1988-03-30',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Kenanga No. 22',
                'rt' => '002',
                'rw' => '002',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
            ],
        ];

        foreach ($penduduks as $data) {
            Penduduk::firstOrCreate(['nik' => $data['nik']], $data);
        }

        // 3. Create Letters (spread across months for chart data) - Only if no letters exist
        if (Surat::count() == 0) {
            $allPenduduks = Penduduk::all();
            $templates = [$skDomisili, $skKelahiran, $skck];

            for ($i = 0; $i < 30; $i++) {
                $p = $allPenduduks->random();
                $t = collect($templates)->random();
                $date = Carbon::now()->subMonths(rand(0, 5))->subDays(rand(1, 28));

                Surat::create([
                    'nomor_surat' => '470/'.str_pad($i + 1, 3, '0', STR_PAD_LEFT).'/DS/'.$date->year,
                    'nomor_register' => 'REG/'.$date->year.'/'.($i + 1),
                    'template_id' => $t->id,
                    'penduduk_id' => $p->id,
                    'tanggal_surat' => $date->toDateString(),
                    'isi_surat' => 'Isi surat otomatis untuk '.$p->nama,
                    'status' => 'dicetak',
                    'dibuat_oleh' => $admin->id,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }
}
