<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;
use App\Models\ProductBarcode;
use App\Models\ProductImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    public function importProductsPage()
    {
        return view('products.importpage');
    }

    public function productsPage(Request $request)
    {
        $barcodesTypes = ProductBarcode::query()->distinct()->pluck('barcode_type');

        $products = Product::query()->get();

        return view('products.products',compact('products','barcodesTypes'));
    }

    public function importFromExcelToBD(Request $request)
    {

        if(!Product::checkFile($request)){
           return redirect(route('importPage'));
        }
        Excel::import(new ProductsImport, $request->file('excelFile'));

        return redirect(route("productsPage"));
    }

    public function downloadImage(Request $request)
    {
        $newImage = new ProductImage();

        $newImage->uploadImage($request->url);

        return redirect(route("productsPage"));
    }

    #TODO Разобраться с вью и дописать входную ссылку в ридми
}
