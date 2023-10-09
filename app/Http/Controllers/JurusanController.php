<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\RuleDetail;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Jurusan::query();

        // Search logic
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = '%' . $request->search . '%';
            $query->where('nama_jurusan', 'like', $searchTerm)->orWhere('kode_jurusan', 'like', $searchTerm);
        }

        // Sort logic
        if ($request->has('sort')) {
            $direction = $request->has('direction') ? $request->direction : 'desc';
            $query->orderBy($request->sort, $direction);
        } else {
            $query->latest(); // Default sorting
        }

        $jurusans = $query->paginate(10);
        return view('jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_jurusan' => 'required|string|max:5|unique:jurusans,kode_jurusan',
            'nama_jurusan' => 'required|string|max:255',
            'ruleDetails' => 'array'
        ]);

        $jurusan = Jurusan::create([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan
        ]);

        // Associate faktas with jurusan using RuleDetail
        foreach ($request->ruleDetails as $kodeFakta) {
            RuleDetail::create([
                'kode_jurusan' => $jurusan->kode_jurusan,
                'kode_fakta' => $kodeFakta
            ]);
        }

        return redirect()->route('jurusan.index')->with('success', 'Jurusan created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode)
    {
        $jurusan = Jurusan::where('kode_jurusan', $kode)->first();
        if (!$jurusan) {
            return redirect()->route('jurusan.index')->with('error', 'Jurusan not found!');
        }
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode)
    {
        $jurusan = Jurusan::where('kode_jurusan', $kode)->first();
        if (!$jurusan) {
            return redirect()->route('jurusan.index')->with('error', 'Jurusan not found!');
        }
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode)
    {
        $jurusan = Jurusan::where('kode_jurusan', $kode)->first();
        if (!$jurusan) {
            return redirect()->route('jurusan.index')->with('error', 'Jurusan not found!');
        }

        // Update the jurusan details
        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan
        ]);

        // Update RuleDetail associations - you might need more advanced logic here
        RuleDetail::where('kode_jurusan', $kode)->delete();
        if (is_array($request->ruleDetails)) {
            foreach ($request->ruleDetails as $kodeFakta) {
                RuleDetail::create([
                    'kode_jurusan' => $kode,
                    'kode_fakta' => $kodeFakta
                ]);
            }
        }


        return redirect()->route('jurusan.index')->with('success', 'Jurusan updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode)
    {
        $jurusan = Jurusan::where('kode_jurusan', $kode)->first();
        if (!$jurusan) {
            return redirect()->route('jurusan.index')->with('error', 'Jurusan not found!');
        }

        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Jurusan deleted successfully!');
    }
}
