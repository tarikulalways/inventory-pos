<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\SupplierPayment;
use Illuminate\Support\Facades\DB;

class SupplierPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplierPayment  = SupplierPayment::latest('id')->with('supplier')->get();
        return view('admin.pages.peyment.index', compact('supplierPayment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = Supplier::latest('id')->get();
        return view('admin.pages.peyment.create', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'supplierId' => 'required|numeric',
            'supplierPayment' => 'required'
        ]);
        $store = SupplierPayment::create([
            'supplierId' => $request->input('supplierId'),
            'supplierPayment' => $request->input('supplierPayment')
        ]);

        $getPayment = $request->input('supplierPayment');
        $id = $store->supplierId;

        $pastDue = Supplier::where('id', $id)->select('pasDue')->get();
        foreach($pastDue as $item){
            $due = $item['pasDue'];
            $total = ($due - $getPayment);
            Supplier::where('id', $id)->update([
                'pasDue' => $total
            ]);
        }
        DB::commit();
        session()->flash('store', 'Supplier Payment Successfull!');
        return redirect()->route('create.smoney');
    }

    /**
     * Display the specified resource.
     */
    public function show(SupplierPayment $supplierPayment)
    {

        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupplierPayment $supplierPayment)
    {
        $supplier = Supplier::latest('id')->get();
        return view('admin.pages.peyment.edit', compact('supplierPayment', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupplierPayment $supplierPayment)
    {
        DB::beginTransaction();
        $sId = $supplierPayment->supplierId;
        $beforePaymet = $supplierPayment->supplierPayment;

        $pasDue = Supplier::where('id', $sId)->select('pasDue')->get();
        foreach($pasDue as $item){
            $due = $item['pasDue'];
            $total = ($due + $beforePaymet);
            Supplier::where('id', $sId)->update([
                'pasDue' => $total
            ]);
        }

        $supplierPayment->update([
            'supplierId' => $request->input('supplierId'),
            'supplierPayment' => $request->input('supplierPayment')
        ]);

        $newId = $request->input('supplierId');

        $newDue = Supplier::where('id', $newId)->select('pasDue')->get();
        foreach($newDue as $item){
            $due = $item['pasDue'];
            $total = ($due - $request->input('supplierPayment'));
            Supplier::where('id', $newId)->update([
                'pasDue' => $total
            ]);
        }
        DB::commit();
       session()->flash('update', 'Supplier Payment Update Succesfull!');
       return redirect()->route('index.smoney');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupplierPayment $supplierPayment)
    {
        $supplierPayment->delete();
        session()->flash('destroy', 'Supplier Payment Delete Successfull!');
        return redirect()->route('index.smoney');

    }
}
