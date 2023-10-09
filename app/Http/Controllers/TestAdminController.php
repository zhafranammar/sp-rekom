<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;


class TestAdminController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('admin.test.index', compact('tests'));
    }

    public function create()
    {
        return view('admin.test.create');
    }

    public function store(Request $request)
    {
        $test = Test::create($request->all());
        return redirect()->route('admin.test.index')->with('success', 'Test created successfully!');
    }

    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('admin.test.edit', compact('test'));
    }

    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();
        return redirect()->route('admin.test.index')->with('success', 'Test deleted successfully!');
    }
}
