<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\InvoiceProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function invoiceProduct(){
        return $this->hasMany(InvoiceProduct::class, 'invoiceId');
    }
    public function customer(){
        return $this->belongsTo(Customer::class, 'customerId');
    }
}
