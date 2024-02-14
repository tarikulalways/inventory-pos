<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\SupplierDue;
use App\Models\ReturnInvoice;
use App\Models\CustomerDueDate;

class DashboardController extends Controller
{
    // dashboard view
    public function dashboardView()
    {
        $customer = Customer::count();
        $supplier = Supplier::count();
        $category = Category::count();
        $product = Product::count();
        $invoice = Invoice::count();

        //dd(Hash::make('1234'));

        // total purchase
        $purchase = Product::sum('purchasePrice');
        // total sale
        $payable = Invoice::sum('totalPayAble');
        $retunAmount = ReturnInvoice::sum('subTotal');
        $date = date('Y-m-d');
        $due = CustomerDueDate::where('payAbleDate', $date)->count();
        if($retunAmount){
            $payable = ($payable - $retunAmount);
        }else{
            $payable;
        }
        // pas due
        $pastDue = Customer::sum('cusotmerPastDue');

        $supplierDue = Supplier::sum('pasDue');
        $supplierPay = SupplierDue::where('payAbleDate', $date)->count();

        // latest product
        $lProduct = Product::latest('id')->select(['productName', 'salePrice', 'maxQty'])->limit(4)->get();
        // out of stock product
        $exproduct = Product::whereColumn('minQty', '>', 'maxQty')->latest('id')->select(['productName', 'minQty', 'salePrice'])->get();
        //dd($exproduct);

        //dd($date);
        return view('admin.dashboard', compact('customer', 'supplier', 'category', 'product', 'invoice', 'purchase', 'payable', 'due', 'pastDue', 'supplierDue', 'supplierPay', 'lProduct', 'exproduct'));

    }

    // customer due
    public function dueList()
    {
        $date = date('Y-m-d');
        $customerDue = CustomerDueDate::where('payAbleDate', $date)->latest('id')->with('customer')->get();
        //dd($customerDue);
        return view('admin.pages.manage-due.customerduelist', compact('customerDue'));
    }
    // supplier due
    public function supplierDeuList()
    {
        $date = date('Y-m-d');
        $sduelsit = SupplierDue::where('payAbleDate', $date)->with('supplier')->latest('id')->get();
        return view('admin.pages.manage-due.supplierduelist', compact('sduelsit'));
    }
}
