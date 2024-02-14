<?php

namespace App\Models;

use App\Models\Invoice;
use App\Models\CustomerDueDate;
use App\Models\CustomerReceiveMoney;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function customerDate(){
        return $this->hasMany(CustomerDueDate::class, 'customerId');
    }
    public function receiveMoney(){
        return $this->hasMany(CustomerReceiveMoney::class, 'customerId');
    }
    public function invoice(){
        return $this->hasMany(Invoice::class, 'customerId');
    }
    public function returnInvoice(){
        return $this->hasMany(ReturnInvoice::class, 'customerId');
    }
}
