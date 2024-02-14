<?php

namespace App\Models;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoiceId');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'productId');
    }
}
