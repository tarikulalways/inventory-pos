<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\CustomerDueDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::latest('id')->with('customerDate')->get();
        //dd($customer);
        return view('admin.pages.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'customerName' => 'required',
            'customerPhone' => 'required',
            'customerAddress' => 'required',
        ]);

        $store = Customer::create([
            'customerName' => $request->input('customerName'),
            'customerPhone' => $request->input('customerPhone'),
            'customerAddress' => $request->input('customerAddress'),
            'cusotmerPastDue' => $request->input('cusotmerPastDue')
        ]);
        $customerId = $store->id;

        CustomerDueDate::create([
            'customerId' => $customerId,
            'payAbleDate' => $request->input('payAbleDate'),
        ]);
        DB::commit();
        session()->flash('store', 'Customer Added Successfull');
        return redirect()->route('create.customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $detail = CustomerDueDate::where('customerId', $customer->id)->get();
        return view('admin.pages.customer.show', compact('customer', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.pages.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        DB::beginTransaction();
        $request->validate([
            'customerName' => 'required',
            'customerPhone' => 'required',
            'customerAddress' => 'required',
        ]);
        $customer->update([
            'customerName' => $request->input('customerName'),
            'customerPhone' => $request->input('customerPhone'),
            'customerAddress' => $request->input('customerAddress'),
            'cusotmerPastDue' => $request->input('cusotmerPastDue'),
        ]);

        $id = $customer->id;
        CustomerDueDate::where('customerId', $id)->create([
            'customerId' => $id,
            'payAbleDate' => $request->input('payAbleDate')
        ]);
        DB::commit();
        session()->flash('update', 'Customer Update Successfull');
        return redirect()->route('index.customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        session()->flash('destroy', 'Customer Delete Successfull');
        return redirect()->route('index.customer');
    }
}
