<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'article',
        'uuid',
        'type',
        'code',
        'foreign_code',
        'unit',
        'price',
        'currency',
        'purchase_price',
        'currency_purchase_price',
        'minimum_balance',
        'minimum_balance_2',
        'minimum_balance_3',
//        'barcode_ean13',
//        'barcode_ean8',
//        'barcode_code128',
//        'barcode_upc',
//        'barcode_gtin',
        'sing_of_subject',
        'ban_sale_retail',
        'minimal_price',
        'currency_minimal_price',
        'nds',
        'nalog_system',
        'provider',
        'uuid_modification_product',
        'code_modification_product',
        'is_archive',
        'is_weight_product',
        'is_labeled_product',
        'is_alcohol_product',
        'is_draft_goods',
        'is_contains_mark',
        'code_type_product',
        'container_capacity',
        'alcohol strength',
        'code_tn_ved',
        'target_gender',
        'type_of_production',
        'age_category',
        'is_set',
        'is_traceable'
    ];

    public function productProperties()
    {
        return $this->hasOne(ProductProperties::class);
    }

    public function productImage()
    {
        return $this->hasOne(ProductImage::class);
    }

    public function productBarcode(): HasMany
    {
        return $this->hasMany(ProductBarcode::class);
    }

    public function getAllBarcodes():array
    {
        $barcodes = $this->productBarcode; // Получаем все штрихкоды этого продукта

        $barcodeArray = [];
        foreach ($barcodes as $item) {
           $barcodeArray[$item->barcode_type] = $item->barcode_value;
        }
        return array_filter($barcodeArray); // Здесь возвращаем массив
    }

    public static function checkFile($request)
    {
        if($request->file('excelFile')->getMimeType()!= 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            session()->put('error', 'Вы добавили не тот файл');
            return false;
        }
        return true;
    }
}
