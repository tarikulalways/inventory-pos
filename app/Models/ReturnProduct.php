<?php

namespace App\Models;

use App\Models\ReturnInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReturnProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function returnInvoice(){
        return $this->belongsTo(ReturnInvoice::class, 'returnInvoiceId');
    }
}
