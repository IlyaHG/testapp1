<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('group')->nullable()->comment('Группы');
            $table->string('article')->nullable()->comment('Артикул');
            $table->string('uuid')->nullable()->comment('UUID');
            $table->string('type')->nullable()->comment('Тип');
            $table->string('code')->nullable()->comment('Код');
            $table->string('foreign_code')->nullable()->comment('Внешний код');
            $table->string('unit')->nullable()->comment('Единица измерения');
            $table->string('price')->nullable()->comment('Цена продажи');
            $table->string('currency')->nullable()->comment('Валюта цены продажи');
            $table->string('purchase_price')->nullable()->comment('Закупочная цена');
            $table->string('currency_purchase_price')->nullable()->comment('Валюта закупочной цены');

            $table->string('minimum_balance')->nullable()->comment('Неснижаемый остаток');
            $table->string('minimum_balance_2')->nullable()->comment('Неснижаемый остаток Одинаковый на всех складах');
            $table->string('minimum_balance_3')->nullable()->comment('Неснижаемый остаток для склада Основной склад');

//            $table->string('barcode_ean13')->nullable()->comment('Штрихкод EAN13');
//            $table->string('barcode_ean8')->nullable()->comment('Штрихкод EAN8');
//            $table->string('barcode_code128')->nullable()->comment('Штрихкод code128');
//            $table->string('barcode_upc')->nullable()->comment('Штрихкод upc');
//            $table->string('barcode_gtin')->nullable()->comment('Штрихкод gtin');

            $table->string('sing_of_subject')->nullable()->comment('Признак предмета расчета');
            $table->string('ban_sale_retail')->nullable()->comment('Запретить скидки при продаже в розницу');

            $table->string('minimal_price')->nullable()->comment('Минимальная цена');
            $table->string('currency_minimal_price')->nullable()->comment('Валюта минимальной цены');

            $table->string('nds')->nullable()->comment('НДС');
            $table->string('nalog_system')->nullable()->comment('Налоговая система');
            $table->string('provider')->nullable()->comment('Поставщик');

            $table->string('uuid_modification_product')->nullable()->comment('UUID товара модификации');
            $table->string('code_modification_product')->nullable()->comment('Код товара модификации');

            $table->string('is_archive')->nullable()->comment('Архивный');

            $table->string('is_weight_product')->nullable()->comment('Весовой продукт');
            $table->string('is_labeled_product')->nullable()->comment('Маркированная продукция');
            $table->string('is_alcohol_product')->nullable()->comment('Алкогольная продукция');
            $table->string('is_draft_goods')->nullable()->comment('Разливной товар');
            $table->string('is_contains_mark')->nullable()->comment('Содержит акцизную марку');
            $table->string('code_type_product')->nullable()->comment('Код вида продукции');

            $table->string('container_capacity')->nullable()->comment('Емкость тары');

            $table->string('alcohol strength')->nullable()->comment('Крепость');
            $table->string('code_tn_ved')->nullable()->comment('Код ТН ВЭД');
            $table->string('target_gender')->nullable()->comment('Целевой пол');
            $table->string('type_of_production')->nullable()->comment('Тип производства');
            $table->string('age_category')->nullable()->comment('Возростная категория');
            $table->string('is_set')->nullable()->comment('Комлект');
            $table->string('is_traceable')->nullable()->comment('Прослеживаемый');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
