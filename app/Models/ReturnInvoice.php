<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\ReturnProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReturnInvoice extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function returnProduct(){
        return $this->hasMany(ReturnProduct::class, 'returnInvoiceId');
    }
    public function customer(){
        return $this->belongsTo(Customer::class, 'customerId');
    }
}
