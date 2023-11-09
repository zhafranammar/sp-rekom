<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Fakta;
use App\Models\Jurusan;
use App\Models\TestDetail;
use App\Models\RuleDetail;
use Dompdf\Dompdf;
use Dompdf\Options;

class TestController extends Controller
{
    public function start()
    {
        $fakta = Fakta::all(); // Mengambil semua data dari tabel Fakta

        // Menampilkan halaman untuk memulai test dengan data fakta
        return view('test.start', ['fakta' => $fakta]);
    }

    public function submit(Request $request)
    {
        // Membuat entry test baru
        $test = Test::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        // Filter data request untuk mengambil hanya data fakta
        $faktaData = $request->except(['_token', 'nama', 'nis', 'usia', 'jenis_kelamin']);
        // dd($faktaData);
        foreach ($faktaData as $kode_fakta => $isTrue) {
            // dd($kode_fakta, $isTrue, $test);
            TestDetail::create([
                'test_id' => $test->id,
                'kode_fakta' => $kode_fakta,
                'is_true' => $isTrue, // pastikan nama kolom ini sesuai dengan struktur tabel Anda
            ]);
        }

        $hasilRekomendasi = $this->findHasil($test->id);

        $test->hasil = $hasilRekomendasi->nama_jurusan;
        $test->save();

        return redirect()->route('test.result', $test->id);
    }


    public function result($id)
    {
        $test = Test::findOrFail($id);
        return view('test.result', compact('test'));
    }

    public function findHasil($test_id)
    {
        // 1. Dapatkan semua kode_fakta dari hasil test user yang is_true adalah 1
        $userFakta = TestDetail::where('test_id', $test_id)
            ->where('is_true', 1)
            ->pluck('kode_fakta')
            ->toArray();

        // 2. Bandingkan dengan RuleDetail untuk menemukan jurusan yang sesuai dengan fakta tersebut
        $matchedJurusan = RuleDetail::whereIn('kode_fakta', $userFakta)
            ->with('jurusan')
            ->get();

        // 3. Hitung berapa kali setiap jurusan muncul
        $jurusanCounts = [];
        foreach ($matchedJurusan as $rule) {
            if (!isset($jurusanCounts[$rule->kode_jurusan])) {
                $jurusanCounts[$rule->kode_jurusan] = 0;
            }
            $jurusanCounts[$rule->kode_jurusan]++;
        }

        // Sort jurusan berdasarkan jumlah kemunculan terbanyak
        arsort($jurusanCounts);

        // Ambil jurusan dengan kemunculan terbanyak
        $topJurusanKode = key($jurusanCounts);
        $recommendedJurusan = Jurusan::where('kode_jurusan', $topJurusanKode)->first();

        return $recommendedJurusan;
    }

    public function generateCertificate($id)
    {
        $test = Test::findOrFail($id);

        // Buat objek PDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);

        // Buat HTML untuk PDF
        $html = '<!DOCTYPE html>
            <!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    padding: 20px;
                }
                h1 {
                    text-align: center;
                    color: #333;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                table, th, td {
                    border: 1px solid #333;
                }
                th, td {
                    padding: 10px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                .title {
                    text-align: center;
                    background: linear-gradient(to right, #311b92, #4a148c);
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .hasil {
                    text-align: center;
                    font-family:monospace;
                }
                .logo {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    width: 100px;
                    height: auto;
                }
                @page {
                    size: landscape;
                }
            </style>
        </head>
        <body>
            <div class="title">
                <img src="https://umsida.ac.id/wp-content/uploads/2020/01/logoGraph300x300.png" alt="Universitas Muhammadiyah Sidoarjo" class="logo">
                <h2>Sistem Pakar Rekomendasi Jurusan</h2>
            </div>
            <h1>Sertifikat Hasil Test</h1>
            <p>Berdasarkan sistem yang kami gunakan maka detail pengguna dengan identitas:</p>
            <table>
                <tr>
                    <th>Nama</th>
                    <td>' . $test->nama . '</td>
                </tr>
                <tr>
                    <th>NIS</th>
                    <td>' . $test->nis . '</td>
                </tr>
                <tr>
                    <th>Usia</th>
                    <td>' . $test->usia . '</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>' . $test->jenis_kelamin . '</td>
                </tr>
                <tr>
                    <th>Tanggal Test</th>
                    <td>' . $test->created_at . '</td>
                </tr>
            </table>
            <p>Sangat sesuai dan kami merekomendasikan pengguna agar mengambil pilihan jurusan :</p>
            <h2 class="hasil">' . $test->hasil . '</h2>
            <p></p>
            </body>
        </html>';


        // Muat HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Render PDF
        $dompdf->render();

        // Tampilkan PDF
        return $dompdf->stream("sertifikat_hasil_test.pdf", [
            "Attachment" => false
        ]);
    }
}
