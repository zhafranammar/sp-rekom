<?php

namespace App\Http\Controllers;

use App\Models\Fakta;
use Illuminate\Http\Request;

class FaktaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Fakta::query();

        // Search logic
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = '%' . $request->search . '%';
            $query->where('deskripsi', 'like', $searchTerm)->orWhere('kode_fakta', 'like', $searchTerm);
        }
        
        // Sort logic
        if ($request->has('sort')) {
            $direction = $request->has('direction') ? $request->direction : 'desc';
            $query->orderBy($request->sort, $direction);
        } else {
            $query->latest(); // Default sorting
        }
        
        $faktas = $query->paginate(10);
        return view('fakta.index', compact('faktas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'kode_fakta' => 'required',
    		'deskripsi' => 'required'
    	]);
 
        Fakta::create([
    		'kode_fakta' => $request->kode_fakta,
    		'deskripsi' => $request->deskripsi
    	]);
 
    	return redirect()->route('fakta.index')->with('succes', 'Fakta added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakta $fakta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_fakta)
    {
        $fakta = Fakta::findOrFail($kode_fakta);
        return view('fakta.edit', compact('fakta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_fakta)
    {
        $request->validate([
            'kode_fakta' => 'required',
    		'deskripsi' => 'required'
        ]);

        $fakta = Fakta::findOrFail($kode_fakta);
        $fakta->update($request->all());
        return redirect()->route('fakta.index')->with('succes', 'Fakta updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_fakta)
    {
        $fakta = Fakta::findOrFail($kode_fakta);
        $fakta->delete();
        return redirect()->route('fakta.index')->with('succes', 'Fakta deleted successfully.');
    }
}
