<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\InvoiceProduct;
use App\Models\CustomerDueDate;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice = Invoice::latest('id')->with('invoiceProduct', 'customer')->get();
        return view('admin.pages.pos.index', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $store = Invoice::create([
            'customerId' => $request->input('customerId'),
            'subTotal' => $request->input('subTotal'),
            'discount' => $request->input('discount'),
            'totalPayAble' => $request->input('totalPayAble'),
            'receiveMoney' => $request->input('receiveMoney'),
            'dueMoney' => $request->input('dueMoney'),
            'duePaymentDate' => $request->input('duePaymentDate'),
            'customerGPN' => $request->input('customerGPN'),
            'customerGPQty' => $request->input('customerGPQty'),
            'customerGPP' => $request->input('customerGPP'),
        ]);

        $invoiceId = $store->id;
        $product = $request->input('products');
        foreach ($product as $products) {
            InvoiceProduct::create([
                'invoiceId' => $invoiceId,
                'productId' => $products['ProductId'],
                'salePrice' => $products['ProductPrice'],
                'productQty' => $products['ProductQty'],
                'total' => $products['total'],
            ]);
        }
        // Qty update
        foreach ($product as $item) {
            $Qty = $item['ProductQty'];
            $productId = $item['ProductId'];
            $maxQty = Product::where('id', $productId)->select('maxQty')->get();
            foreach ($maxQty as $Qtyvlue) {
                $totalQty = ($Qtyvlue['maxQty'] - $Qty);

                Product::where('id', $productId)->update([
                    'maxQty' => $totalQty,
                ]);
            }
        }

        // customer due
        $customerId = $request->input('customerId');
        $recentDue = $request->input('dueMoney');
        $pasDue = Customer::where('id', $customerId)->select('cusotmerPastDue')->get();

        foreach ($pasDue as $item) {
            $due = $item['cusotmerPastDue'];
            $total = ($due + $recentDue);
            Customer::where('id', $customerId)->select('pasDue')->update([
                'cusotmerPastDue' => $total,
            ]);
        }

        // due date create
        CustomerDueDate::create([
            'customerId' => $request->input('customerId'),
            'payAbleDate' => $request->input('duePaymentDate'),
        ]);

        DB::commit();
        return response()->json(['status' => 'success', 'mess' => 'Invoice Create Successfull!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $invoiceId = $request->input('id');
        $invoiceDetail = InvoiceProduct::where('invoiceId', $invoiceId)->with('product')->get();
        return response()->json(['status' => 'success', 'mess' => $invoiceDetail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        session()->flash('destroy', 'Invoice Delete Successfull!');
        return redirect()->route('index.invoice');
    }
}
