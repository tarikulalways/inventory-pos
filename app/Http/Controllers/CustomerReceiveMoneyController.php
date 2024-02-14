<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerReceiveMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerReceiveMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receiveMoney = CustomerReceiveMoney::latest('id')->with('customer')->get();
        //dd($receiveMoney);
        return view('admin.pages.receive-money.index', compact('receiveMoney'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = Customer::latest('id')->get();
        return view('admin.pages.receive-money.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'customerId' => 'required|numeric',
            'receiveMoney' => 'required'
        ]);
        $store = CustomerReceiveMoney::create([
            'customerId' => $request->input('customerId'),
            'receiveMoney' => $request->input('receiveMoney'),
        ]);

        // get the receive money
        $receiveMoney = $store->receiveMoney;
        // get the customer past due
        $customerId = $request->input('customerId');
        $pastDue = Customer::where('id', $customerId)->select('cusotmerPastDue')->get();
        foreach ($pastDue as $item) {
            $getPastMone = $item['cusotmerPastDue'];

            // update customer pas due
            $cusotmerPastDue = ($getPastMone - $receiveMoney);
            Customer::where('id', $customerId)->update([
                'cusotmerPastDue' => $cusotmerPastDue,
            ]);
        }

        DB::commit();
        session()->flash('store', 'Receive Money Successfull!');
        return redirect()->route('create.customerMoney');

    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerReceiveMoney $customerReceiveMoney)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerReceiveMoney $customerReceiveMoney)
    {
        $customer = Customer::latest('id')->get();
        return view('admin.pages.receive-money.edit', compact('customerReceiveMoney', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerReceiveMoney $customerReceiveMoney)
    {

        DB::beginTransaction();
        // before due
        $cId = $customerReceiveMoney->customerId;
        $beforeReceiveMoney = $customerReceiveMoney->receiveMoney;
        $beforeDue = Customer::where('id', $cId)->select('cusotmerPastDue')->get();

        foreach($beforeDue as $item){
            $pastDue = $item['cusotmerPastDue'];
            $total = ($pastDue + $beforeReceiveMoney);
            Customer::where('id', $cId)->update([
                'cusotmerPastDue' => $total
            ]);
        }

        $customerReceiveMoney->update([
            'customerId' => $request->input('customerId'),
            'receiveMoney' => $request->input('receiveMoney')
        ]);

        // before due

        $customerId = $request->input('customerId');
        $customer = Customer::where('id', $customerId)->select('cusotmerPastDue')->get();

        foreach($customer as $item){
            $pastDue = $item['cusotmerPastDue'];
            $total = ($pastDue - $request->input('receiveMoney'));
            Customer::where('id', $customerId)->update([
                'cusotmerPastDue' => $total
            ]);
        }

        DB::commit();
        session()->flash('update', 'Receive Money Update Successfull!');
        return redirect()->route('index.customerMoney');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerReceiveMoney $customerReceiveMoney)
    {
        $customerReceiveMoney->delete();
        session()->flash('destroy', 'Receive Money Delete Successfull!');
        return redirect()->route('index.customerMoney');
    }
}
