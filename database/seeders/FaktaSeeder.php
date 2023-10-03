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
            ['kode_fakta' => 'F1', 'deskripsi' => 'Senang dengan Matematika'],
            ['kode_fakta' => 'F2', 'deskripsi' => 'Senang bergaul dan memiliki banyak relasi'],
            ['kode_fakta' => 'F3', 'deskripsi' => 'Senang berkerja dengan alat - alat'],
            ['kode_fakta' => 'F4', 'deskripsi' => 'Senang membaca buku / artikel komputer'],
            ['kode_fakta' => 'F5', 'deskripsi' => 'Senang berkerja dengan perangkat jaringan'],
            ['kode_fakta' => 'F6', 'deskripsi' => 'Senang menginstal software sistem operasi dan aplikasi'],
            ['kode_fakta' => 'F7', 'deskripsi' => 'Senang memperbaiki peripheral computer'],
            ['kode_fakta' => 'F8', 'deskripsi' => 'Tertarik dalam bidang computer jaringan'],
            ['kode_fakta' => 'F9', 'deskripsi' => 'Bisa mempengaruhi (Persuasive)'],
            ['kode_fakta' => 'F10', 'deskripsi' => 'Senang menggunakan kamera'],
            ['kode_fakta' => 'F11', 'deskripsi' => 'Senang menggambar / melukis'],
            ['kode_fakta' => 'F12', 'deskripsi' => 'Senang memperhatikan gambar daripada tulisan'],
            ['kode_fakta' => 'F13', 'deskripsi' => 'Senang mengingat sesuatu melalui gambar / diagram'],
            ['kode_fakta' => 'F14', 'deskripsi' => 'Senang dengan permainan menggunakan logika'],
            ['kode_fakta' => 'F15', 'deskripsi' => 'Bisa mengurutkan sesuatu agar cepat diingat'],
            ['kode_fakta' => 'F16', 'deskripsi' => 'Senang memanajemen pengembangan perangkat lunak'],
            ['kode_fakta' => 'F17', 'deskripsi' => 'Senang dengan kode kode unik'],
            ['kode_fakta' => 'F18', 'deskripsi' => 'Senang membuat desain desain unik'],
            ['kode_fakta' => 'F19', 'deskripsi' => 'Senang mengerjakan laporan keuangan'],
            ['kode_fakta' => 'F20', 'deskripsi' => 'Senang dengan perkerjaan yang membutuhkan teliti'],
            ['kode_fakta' => 'F21', 'deskripsi' => 'Senang mengoprasikan aplikasi komputer akuntansi'],
            ['kode_fakta' => 'F22', 'deskripsi' => 'Senang dengan program pengolahan angka'],
            ['kode_fakta' => 'F23', 'deskripsi' => 'Tertarik mendalami bidang akuntansi'],
            ['kode_fakta' => 'F24', 'deskripsi' => 'Menguasai / senang berbahasa asing'],
            ['kode_fakta' => 'F25', 'deskripsi' => 'Senang dengan kegiatan surat menyurat'],
            ['kode_fakta' => 'F26', 'deskripsi' => 'Senang mengatur jadwal (memanajemen waktu)'],
            ['kode_fakta' => 'F27', 'deskripsi' => 'Senang mengoperasikan perangkat lunak perbankan'],
            ['kode_fakta' => 'F28', 'deskripsi' => 'Tertarik pada perkerjaan perbankan'],
            ['kode_fakta' => 'F29', 'deskripsi' => 'Tertarik mendalami permesinan'],
            ['kode_fakta' => 'F30', 'deskripsi' => 'Bisa mengoperasikan permesinan'],
            ['kode_fakta' => 'F31', 'deskripsi' => 'Bisa berfikir secara logis dan sistematis'],
            ['kode_fakta' => 'F32', 'deskripsi' => 'Senang memperbaiki barang barang elektronik'],
            ['kode_fakta' => 'F33', 'deskripsi' => 'Senang dengan ilmu komputasi'],
            ['kode_fakta' => 'F34', 'deskripsi' => 'Senang bercerita'],
            ['kode_fakta' => 'F35', 'deskripsi' => 'Senang tampil di depan kamera'],
            ['kode_fakta' => 'F36', 'deskripsi' => 'Senang mencari berita'],
            ['kode_fakta' => 'F37', 'deskripsi' => 'Senang memandu acara'],
            ['kode_fakta' => 'F38', 'deskripsi' => 'Tertarik mendalami bidang penyiaran'],
        ];

        foreach ($faktas as $faktaData) {
            $fakta = new Fakta();
            $fakta->kode_fakta = $faktaData['kode_fakta'];
            $fakta->deskripsi = $faktaData['deskripsi'];
            $fakta->save();
        }
    }
}
