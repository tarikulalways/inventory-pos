<?php

namespace App\Http\Controllers;

use App\Models\Expensive;
use Illuminate\Http\Request;

class ExpensiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expensive = Expensive::latest('id')->get();
        return view('admin.pages.expensive.index', compact('expensive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.expensive.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'expensfor' => 'required',
            'expamount' => 'required',
        ]);
        $store = Expensive::create([
            'expensfor' => $request->input('expensfor'),
            'expamount' => $request->input('expamount')
        ]);
        session()->flash('store', 'Expensive Added Successfull!');
        return redirect()->route('create.expensive');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expensive $expensive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expensive $expensive)
    {
        return view('admin.pages.expensive.edit', compact('expensive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expensive $expensive)
    {
        $request->validate([
            'expensfor' => 'required',
            'expamount' => 'required',
        ]);
        $expensive->update([
            'expensfor' => $request->input('expensfor'),
            'expamount' => $request->input('expamount')
        ]);
        session()->flash('update', 'Expensive Update Successfull!');
        return redirect()->route('index.expensive');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expensive $expensive)
    {
        $expensive->delete();
        session()->flash('destroy', 'Expensive Delete Successfull!');
        return redirect()->route('index.expensive');
    }
}
