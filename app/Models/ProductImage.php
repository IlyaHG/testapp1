<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_image',
        'link_to_packaging'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function uploadImage($url)
    {

        $urlArray = explode(",",$url);

        foreach ($urlArray as $url) {
            try {
                if (@file_get_contents($url) === false) {
                    session()->put('error',"По такому пути файла нет или нет доступа: " . $url . "\n");
                    throw new Exception('По такому пути файла нет или нет доступа: ' . $url . "\n");
                }
                $imageData = file_get_contents($url);
                $fileName = basename($url);
                Storage::disk('local')->put('images/' . $fileName, $imageData);
            } catch (Exception $e) {
                session()->put('error', $e->getMessage() . "\n" );
            }
        }
    }

}
