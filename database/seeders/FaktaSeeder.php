<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fakta;

class FaktaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faktas = [
            ['KodeFakta' => 'F1', 'Deskripsi' => 'Senang dengan Matematika'],
            ['KodeFakta' => 'F2', 'Deskripsi' => 'Senang bergaul dan memiliki banyak relasi'],
            ['KodeFakta' => 'F3', 'Deskripsi' => 'Senang berkerja dengan alat - alat'],
            ['KodeFakta' => 'F4', 'Deskripsi' => 'Senang membaca buku / artikel komputer'],
            ['KodeFakta' => 'F5', 'Deskripsi' => 'Senang berkerja dengan perangkat jaringan'],
            ['KodeFakta' => 'F6', 'Deskripsi' => 'Senang menginstal software sistem operasi dan aplikasi'],
            ['KodeFakta' => 'F7', 'Deskripsi' => 'Senang memperbaiki peripheral computer'],
            ['KodeFakta' => 'F8', 'Deskripsi' => 'Tertarik dalam bidang computer jaringan'],
            ['KodeFakta' => 'F9', 'Deskripsi' => 'Bisa mempengaruhi (Persuasive)'],
            ['KodeFakta' => 'F10', 'Deskripsi' => 'Senang menggunakan kamera'],
            ['KodeFakta' => 'F11', 'Deskripsi' => 'Senang menggambar / melukis'],
            ['KodeFakta' => 'F12', 'Deskripsi' => 'Senang memperhatikan gambar daripada tulisan'],
            ['KodeFakta' => 'F13', 'Deskripsi' => 'Senang mengingat sesuatu melalui gambar / diagram'],
            ['KodeFakta' => 'F14', 'Deskripsi' => 'Senang dengan permainan menggunakan logika'],
            ['KodeFakta' => 'F15', 'Deskripsi' => 'Bisa mengurutkan sesuatu agar cepat diingat'],
            ['KodeFakta' => 'F16', 'Deskripsi' => 'Senang memanajemen pengembangan perangkat lunak'],
            ['KodeFakta' => 'F17', 'Deskripsi' => 'Senang dengan kode kode unik'],
            ['KodeFakta' => 'F18', 'Deskripsi' => 'Senang membuat desain desain unik'],
            ['KodeFakta' => 'F19', 'Deskripsi' => 'Senang mengerjakan laporan keuangan'],
            ['KodeFakta' => 'F20', 'Deskripsi' => 'Senang dengan perkerjaan yang membutuhkan teliti'],
            ['KodeFakta' => 'F21', 'Deskripsi' => 'Senang mengoprasikan aplikasi komputer akuntansi'],
            ['KodeFakta' => 'F22', 'Deskripsi' => 'Senang dengan program pengolahan angka'],
            ['KodeFakta' => 'F23', 'Deskripsi' => 'Tertarik mendalami bidang akuntansi'],
            ['KodeFakta' => 'F24', 'Deskripsi' => 'Menguasai / senang berbahasa asing'],
            ['KodeFakta' => 'F25', 'Deskripsi' => 'Senang dengan kegiatan surat menyurat'],
            ['KodeFakta' => 'F26', 'Deskripsi' => 'Senang mengatur jadwal (memanajemen waktu)'],
            ['KodeFakta' => 'F27', 'Deskripsi' => 'Senang mengoperasikan perangkat lunak perbankan'],
            ['KodeFakta' => 'F28', 'Deskripsi' => 'Tertarik pada perkerjaan perbankan'],
            ['KodeFakta' => 'F29', 'Deskripsi' => 'Tertarik mendalami permesinan'],
            ['KodeFakta' => 'F30', 'Deskripsi' => 'Bisa mengoperasikan permesinan'],
            ['KodeFakta' => 'F31', 'Deskripsi' => 'Bisa berfikir secara logis dan sistematis'],
            ['KodeFakta' => 'F32', 'Deskripsi' => 'Senang memperbaiki barang barang elektronik'],
            ['KodeFakta' => 'F33', 'Deskripsi' => 'Senang dengan ilmu komputasi'],
            ['KodeFakta' => 'F34', 'Deskripsi' => 'Senang bercerita'],
            ['KodeFakta' => 'F35', 'Deskripsi' => 'Senang tampil di depan kamera'],
            ['KodeFakta' => 'F36', 'Deskripsi' => 'Senang mencari berita'],
            ['KodeFakta' => 'F37', 'Deskripsi' => 'Senang memandu acara'],
            ['KodeFakta' => 'F38', 'Deskripsi' => 'Tertarik mendalami bidang penyiaran'],
        ];

        foreach ($faktas as $faktaData) {
            $fakta = new Fakta();
            $fakta->KodeFakta = $faktaData['KodeFakta'];
            $fakta->Deskripsi = $faktaData['Deskripsi'];
            $fakta->save();
        }
    }
}
