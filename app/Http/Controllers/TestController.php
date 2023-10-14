<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Fakta;
use App\Models\Jurusan;
use App\Models\TestDetail;
use App\Models\RuleDetail;

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
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        // Filter data request untuk mengambil hanya data fakta
        $faktaData = $request->except(['_token', 'nama', 'kelas']);
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
}
