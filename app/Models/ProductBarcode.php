<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBarcode extends Model
{
    use HasFactory;


    protected $fillable = [
        'barcode_type',
        'barcode_value',
        'product_id',

    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
