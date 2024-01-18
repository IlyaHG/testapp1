<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_properties', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable()->comment('ID продукта');
            $table->tinyText('name_of_product')->nullable()->comment('Наименование');
            $table->text('description')->nullable()->comment('Описание');
            $table->string('size')->nullable()->comment('Размер');
            $table->string('color')->nullable()->comment('Цвет');
            $table->string('brand')->nullable()->comment('Бренд');
            $table->string('structure')->nullable()->comment('Состав');
            $table->string('weight')->nullable()->comment('Вес');
            $table->string('volume')->nullable()->comment('Объем');
            $table->string('country')->nullable()->comment('Страна');
            $table->string('amount_in_a_package')->nullable()->comment('Количество в упаковке');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_properties');
    }
};
