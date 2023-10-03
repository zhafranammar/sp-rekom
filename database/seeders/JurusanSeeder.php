<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusans = [
            ['KodeJurusan' => 'J1', 'NamaJurusan' => 'Teknik Komputer dan Jaringan'],
            ['KodeJurusan' => 'J2', 'NamaJurusan' => 'Multimedia'],
            ['KodeJurusan' => 'J3', 'NamaJurusan' => 'Rekayasa Perangkat Lunak'],
            ['KodeJurusan' => 'J4', 'NamaJurusan' => 'Akuntansi'],
            ['KodeJurusan' => 'J5', 'NamaJurusan' => 'Perbankan'],
            ['KodeJurusan' => 'J6', 'NamaJurusan' => 'Teknik Mekatronika'],
            ['KodeJurusan' => 'J7', 'NamaJurusan' => 'Produksi Siaran Televisi'],
        ];

        foreach ($jurusans as $jurusanData) {
            $jurusan = new Jurusan();
            $jurusan->kode_jurusan = $jurusanData['KodeJurusan'];
            $jurusan->nama_jurusan = $jurusanData['NamaJurusan'];
            $jurusan->save();
        }
    }
}
