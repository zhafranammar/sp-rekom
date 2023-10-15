<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;


class TestAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Test::query();

        // Search logic
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = '%' . $request->search . '%';
            $query->where('nama', 'like', $searchTerm)->orWhere('jenis_kelamin', 'like', $searchTerm)->orWhere('hasil', 'like', $searchTerm);
        }

        // Sort logic
        if ($request->has('sort')) {
            $direction = $request->has('direction') ? $request->direction : 'desc';
            $query->orderBy($request->sort, $direction);
        } else {
            $query->latest(); // Default sorting
        }

        // Start date and end date logic
        if ($request->has('start_date') && !empty($request->start_date)) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->has('end_date') && !empty($request->end_date)) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }


        $tests = $query->paginate(10);
        return view('admin.test.index', compact('tests'));
    }

    public function show($id)
    {
        $test = Test::with('details.fakta')->findOrFail($id);
        return view('admin.test.show', compact('test'));
    }

    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();
        return redirect()->route('admin.test.index')->with('success', 'Test deleted successfully!');
    }
}
