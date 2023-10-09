<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestDetail;

class TestController extends Controller
{
    public function start()
    {
        // Menampilkan halaman untuk memulai test
        return view('test.start');
    }

    public function submit(Request $request)
    {
        // Membuat entry test baru
        $test = Test::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ]);

        // Menyimpan detail dari test tersebut
        foreach ($request->all() as $kode_fakta => $isTrue) {
            TestDetail::create([
                'test_id' => $test->id,
                'kode_fakta' => $kode_fakta,
                'isTrue' => $isTrue,
            ]);
        }

        return redirect()->route('test.result', $test->id);
    }

    public function result($id)
    {
        $test = Test::with('testDetails')->findOrFail($id);
        return view('test.result', compact('test'));
    }
}
