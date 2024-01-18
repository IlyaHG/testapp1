<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProperties extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name_of_product',
        'description',
        'size',
        'color',
        'brand',
        'structure',
        'weight',
        'volume',
        'country',
        'amount_in_a_package',];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
