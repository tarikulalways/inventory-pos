<?php

namespace App\Models;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierPayment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplierId');
    }
}
