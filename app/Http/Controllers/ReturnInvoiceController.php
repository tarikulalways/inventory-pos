<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\ReturnInvoice;
use App\Models\ReturnProduct;
use Illuminate\Support\Facades\DB;

class ReturnInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returnInvoice = ReturnInvoice::latest('id')->with('customer')->get();
        return view('admin.pages.sale-return.index', compact('returnInvoice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = Customer::latest('id')->get();

        return view('admin.pages.sale-return.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customerId' => 'required|numeric',
            'subTotal' => 'required',
        ]);
        $store = ReturnInvoice::create([
            'customerId' => $request->input('customerId'),
            'subTotal' => $request->input('subTotal'),
        ]);
       session()->flash('store', 'Return Create Successfull!');
       return redirect()->route('create.return');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReturnInvoice $returnInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReturnInvoice $returnInvoice)
    {
        $customer = Customer::latest('id')->get();
        return view('admin.pages.sale-return.edit', compact('customer', 'returnInvoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReturnInvoice $returnInvoice)
    {
        $request->validate([
            'customerId' => 'required|numeric',
            'subTotal' => 'required',
        ]);

        $returnInvoice->update([
            'customerId' => $request->input('customerId'),
            'subTotal' => $request->input('subTotal'),
        ]);
        session()->flash('update', 'Return Update Successfull!');
        return redirect()->route('index.return');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReturnInvoice $returnInvoice)
    {
        $returnInvoice->delete();
        session()->flash('destroy', 'Return delete Successfull!');
        return redirect()->route('index.return');
    }
}
