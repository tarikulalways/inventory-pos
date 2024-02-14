<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function saleItem(){
        $customer = Customer::latest('id')->get();

        $product = Product::whereColumn('maxQty', '>', 'minQty')->select(['id', 'productName', 'minQty', 'maxQty', 'salePrice', 'purchasePrice'])->get();

        return view('admin.pages.pos.create', compact('customer', 'product'));
    }

    // add customr by modal
    public function storeCustomerModal(Request $request){
        $store = Customer::create([
            'customerName' => $request->input('customerName'),
            'customerPhone' => $request->input('customerPhone'),
            'customerAddress' => $request->input('customerAddress'),
        ]);
        return response()->json(['status'=>'success', 'mess'=>'Customer Added Successfull!']);
    }

}
