<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierDue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::latest('id')->with('supplierDue')->get();
        return view('admin.pages.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'supplierName' => 'required',
            'supplierPhone' => 'required',
            'supplierAddress' => 'required',
        ]);
        $store = Supplier::create([
            'supplierName' => $request->input('supplierName'),
            'supplierPhone' => $request->input('supplierPhone'),
            'supplierAddress' => $request->input('supplierAddress'),
            'pasDue' => $request->input('pasDue'),
        ]);
        $supplierId = $store->id;

        SupplierDue::create([
            'supplierId' => $supplierId,
            'payAbleDate' => $request->input('payAbleDate')
        ]);

        DB::commit();

        session()->flash('store', 'Supplier Added Successfull!');
        return redirect()->route('create.supplier');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        $detail = SupplierDue::where('supplierId', $supplier->id)->get();
        return view('admin.pages.supplier.show', compact('detail', 'supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.pages.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        DB::beginTransaction();

       $supplier->update([
            'supplierName' => $request->input('supplierName'),
            'supplierPhone' => $request->input('supplierPhone'),
            'supplierAddress' => $request->input('supplierAddress'),
            'pasDue' => $request->input('pasDue'),
        ]);

        $id = $supplier->id;

        SupplierDue::create([
            'supplierId' => $id,
            'payAbleDate' => $request->input('payAbleDate')
        ]);

        DB::commit();
        session()->flash('update', 'Supplier Update Successfull!');
        return redirect()->route('index.supplier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        session()->flash('destroy', 'Supplier Delete Successfulll!');
        return redirect()->route('index.supplier');
    }
}
