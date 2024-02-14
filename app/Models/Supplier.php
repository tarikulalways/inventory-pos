<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SupplierDue;
use App\Models\SupplierPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function supplierDue(){
        return $this->hasMany(SupplierDue::class, 'supplierId');
    }
    public function SupplierPayment(){
        return $this->hasMany(SupplierPayment::class, 'supplierId');
    }
    public function product(){
        return $this->hasMany(Product::class, 'supplierId');
    }
}
