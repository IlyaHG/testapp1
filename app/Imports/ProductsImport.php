<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductBarcode;
use App\Models\ProductImage;
use App\Models\ProductProperties;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return DB::transaction(function () use ($row) {
            switch ($row['gruppy']) {
                // Если появится другой тип товара, делаем новый кейс.
                case $row['gruppy'] == 'Одежда Collant':
                    $barcodes = array_filter($row, function ($key) {
                        return str_starts_with($key, 'strixkod');
                    }, ARRAY_FILTER_USE_KEY);

                    $product = Product::create([
                        'group' => $row['gruppy'],
                        'uuid' => $row['uuid'],
                        'type' => $row['tip'],
                        'code' => $row['kod'],
                        'foreign_code' => $row['vnesnii_kod'],
                        'article' => $row['artikul'],
                        'unit' => $row['edinica_izmereniia'],
                        'price' => $row['cena_cena_prodazi'],
                        'currency' => $row['valiuta_cena_prodazi'],
                        'purchase_price' => $row['zakupocnaia_cena'],
                        'currency_purchase_price' => $row['valiuta_zakupocnaia_cena'],
                        'minimum_balance' => $row['nesnizaemyi_ostatok'],
                        'minimum_balance_2' => $row['nesnizaemyi_ostatok_odinakovyi_na_vsex_skladax'],
                        'minimum_balance_3' => $row['nesnizaemyi_ostatok_dlia_sklada_osnovnoi_sklad'],
                        'sing_of_subject' => $row['priznak_predmeta_rasceta'],
                        'ban_sale_retail' => $row['zapretit_skidki_pri_prodaze_v_roznicu'],
                        'minimal_price' => $row['minimalnaia_cena'],
                        'currency_minimal_price' => $row['valiuta_minimalnaia_cena'],
                        'nds' => $row['nds'],
                        'nalog_system' => $row['sistema_nalogooblozeniia'],
                        'provider' => $row['postavshhik'],
                        'uuid_modification_product' => $row['uuid_tovara_modifikacii'],
                        'code_modification_product' => $row['kod_tovara_modifikacii'],
                        'is_archive' => $row['arxivnyi'],
                        'is_weight_product' => $row['vesovoi_tovar'],
                        'is_labeled_product' => $row['markirovannaia_produkciia'],
                        'is_draft_goods' => $row['razlivnoi_tovar'],
                        'is_alcohol_product' => $row['alkogolnaia_produkciia'],
                        'is_contains_mark' => $row['soderzit_akciznuiu_marku'],
                        'code_type_product' => $row['kod_vida_produkcii'],
                        'container_capacity' => $row['emkost_tary_v_l'],
                        'alcohol strength' => $row['krepost'],
                        'code_tn_ved' => $row['kod_tn_ved'],
                        'target_gender' => $row['celevoi_pol'],
                        'type_of_production' => $row['tip_proizvodstva'],
                        'age_category' => $row['vozrastnaia_kategoriia'],
                        'is_set' => $row['komplekt'],
                        'is_traceable' => $row['proslezivaemyi'],
                    ]);

                    foreach ($barcodes as $key => $item) {
                        $productBarcodes = new ProductBarcode();
                        $productBarcodes->barcode_type = $key;
                        $productBarcodes->barcode_value = $item;
                        $productBarcodes->product_id = $product->id;
                        $product->productBarcode()->save($productBarcodes);
                    }

                    $productProperties = new ProductProperties([
                        'name_of_product' => $row['naimenovanie'],
                        'description' => $row['opisanie'],
                        'size' => $row['dop_pole_razmer'],
                        'color' => $row['dop_pole_cvet'],
                        'brand' => $row['dop_pole_brend'],
                        'structure' => $row['dop_pole_sostav'],
                        'volume' => $row['obieem'],
                        'amount_in_package' => $row['dop_pole_kol_vo_v_upakovke'],
                        'weight' => $row['ves'],
                        'country' => $row['strana'],
                    ]);

                    $productImage = new ProductImage([
                        'link_to_packaging' => $row['dop_pole_ssylka_na_upakovku'],
                        'product_image' => $row['dop_pole_ssylki_na_foto'],
                    ]);
                    $product->productProperties()->save($productProperties);
                    $product->productImage()->save($productImage);
                    break;
            }
            return $product;

        });
    }
}
