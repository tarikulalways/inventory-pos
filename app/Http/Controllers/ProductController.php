<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::latest('id')->with('category', 'supplier')->get();
        //dd($product);
        return view('admin.pages.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::latest('id')->get();
        $supplier = Supplier::latest('id')->get();
        return view('admin.pages.product.create', compact('category', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required',
            'categoryId' => 'required|numeric',
            'purchasePrice' => 'required',
            'salePrice' => 'required',
            'minQty' => 'required',
            'maxQty' => 'required',
            'supplierId' => 'required|numeric',
        ]);
        $store = Product::create([
            'productName' => $request->input('productName'),
            'productSlug' => Str::slug($request->input('productName')),
            'categoryId' => $request->input('categoryId'),
            'productCode' => $request->input('productCode'),
            'purchasePrice' => $request->input('purchasePrice'),
            'salePrice' => $request->input('salePrice'),
            'minQty' => $request->input('minQty'),
            'maxQty' => $request->input('maxQty'),
            'supplierId' => $request->input('supplierId'),
        ]);

        session()->flash('store', 'Product Added Successfull!');
        return redirect()->route('create.producct');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::latest('id')->get();
        $supplier = Supplier::latest('id')->get();
        return view('admin.pages.product.edit', compact('category', 'supplier','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'productName' => 'required',
            'categoryId' => 'required|numeric',
            'purchasePrice' => 'required',
            'salePrice' => 'required',
            'minQty' => 'required',
            'maxQty' => 'required',
            'supplierId' => 'required|numeric',
        ]);

        $product->update([
            'productName' => $request->input('productName'),
            'productSlug' => Str::slug($request->input('productName')),
            'categoryId' => $request->input('categoryId'),
            'productCode' => $request->input('productCode'),
            'purchasePrice' => $request->input('purchasePrice'),
            'salePrice' => $request->input('salePrice'),
            'minQty' => $request->input('minQty'),
            'maxQty' => $request->input('maxQty'),
            'supplierId' => $request->input('supplierId'),
        ]);

        session()->flash('update', 'Product Update Successfull!');
        return redirect()->route('index.producct');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('destroy', 'Product Delete Successfull!');
        return redirect()->route('index.producct');
    }
}
