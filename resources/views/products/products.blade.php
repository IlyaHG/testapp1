@extends('layout')
@section('title','Продукты из БД')
@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="row">
            <div class="col-sm table-responsive">
                <h3 class="d-flex justify-content-center">
                    Товары из Excel таблицы
                </h3>

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                        {{session()->forget('error')}}
                    </div>
                @endif
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th class="column-title" scope="col"></th>
                        <th class="column-title" scope="col">Группы</th>
                        <th class="column-title" scope="col">UUID</th>
                        <th class="column-title" scope="col">Тип</th>
                        <th class="column-title" scope="col">Код</th>
                        <th class="column-title" scope="col">Наименование</th>
                        <th class="column-title" scope="col">Внешний код</th>
                        <th class="column-title" scope="col">Артикул</th>
                        <th class="column-title" scope="col">Единица измерения</th>
                        <th class="column-title" scope="col">Цена: Цена продажи</th>
                        <th class="column-title" scope="col">Валюта (Цена продажи)</th>
                        <th class="column-title" scope="col">Закупочная цена</th>
                        <th class="column-title" scope="col">Валюта (Закупочная цена)</th>
                        <th class="column-title" scope="col">Неснижаемый остаток</th>
                        <th class="column-title" scope="col">Неснижаемый остаток Одинаковый на всех складах</th>
                        <th class="column-title" scope="col">Неснижаемый остаток для склада Основной склад</th>
                        <form action="{{route('productsPage')}}" method="GET">
                            @csrf
                            <th class="column-title" scope="col">Штрихкод
                                <select name="barcode">
                                    @foreach($barcodesTypes as $barcodesType)

                                        <option value="{{$barcodesType}}"
                                                @if(request('barcode') == $barcodesType) selected @endif > {{$barcodesType}}</option>
                                    @endforeach
                                </select>
                                <div class="d-flex justify-content-center">
                                    <input class="btn btn-primary mt-2" type="submit"  value="Изменить">
                                </div>
                            </th>
                        </form>
                        <th class="column-title" scope="col">Описание</th>
                        <th class="column-title" scope="col">Признак предмета расчета</th>
                        <th class="column-title" scope="col">Запретить скидки при продаже в розницу</th>
                        <th class="column-title" scope="col">Минимальная цена</th>
                        <th class="column-title" scope="col">Валюта (Минимальная цена)</th>
                        <th class="column-title" scope="col">Страна</th>
                        <th class="column-title" scope="col">НДС</th>
                        <th class="column-title" scope="col">Система налогообложения</th>
                        <th class="column-title" scope="col">Поставщик</th>
                        <th class="column-title" scope="col">UUID товара модификации</th>
                        <th class="column-title" scope="col">Код товара модификации</th>
                        <th class="column-title" scope="col">Архивный</th>
                        <th class="column-title" scope="col">Вес</th>
                        <th class="column-title" scope="col">Весовой товар</th>
                        <th class="column-title" scope="col">Маркированная продукция</th>
                        <th class="column-title" scope="col">Объем</th>
                        <th class="column-title" scope="col">Разливной товар</th>
                        <th class="column-title" scope="col">Алкогольная продукция</th>
                        <th class="column-title" scope="col">Содержит акцизную марку</th>
                        <th class="column-title" scope="col">Емкость тары в л</th>
                        <th class="column-title" scope="col">Крепость</th>
                        <th class="column-title" scope="col"> Код ТН ВЭД</th>
                        <th class="column-title" scope="col">Целевой пол</th>
                        <th class="column-title" scope="col">Тип производства</th>
                        <th class="column-title" scope="col">Код вида продукции</th>
                        <th class="column-title" scope="col">Возрастная категория</th>
                        <th class="column-title" scope="col">Комплект</th>
                        <th class="column-title" scope="col">Прослеживаемый</th>
                        <th class="column-title" scope="col">Доп. поле: Размер</th>
                        <th class="column-title" scope="col">Доп. поле: Цвет</th>
                        <th class="column-title" scope="col">Доп. поле: Бренд</th>
                        <th class="column-title" scope="col">Доп. поле: Состав</th>
                        <th class="column-title" scope="col">Доп. поле: Кол-во в упаковке</th>
                        <th class="column-title" scope="col">Доп. поле: Ссылка на упаковку</th>
                        <th class="column-title" scope="col">Доп. поле: Ссылки на фото</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->group}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->type}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->productProperties->name_of_product}}</td>
                            <td>{{$product->foreign_code}}</td>
                            <td>{{$product->article}}</td>
                            <td>{{$product->unit}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->currency}}</td>
                            <td>{{$product->purchase_price}}</td>
                            <td>{{$product->currency_purchase_price}}</td>
                            <td>{{$product->minimum_balance}}</td>
                            <td>{{$product->minimum_balance_2}}</td>
                            <td>{{$product->minimum_balance_3}}</td>
                            <td>
                                @if(!empty(request('barcode')) AND isset($product->getAllBarcodes()[request('barcode')]))
                                    {{ $product->getAllBarcodes()[request('barcode')]  }}
                                @elseif(!empty(request('barcode')) AND !isset($product->getAllBarcodes()[request('barcode')]))
                                    {{ ' ' }}
                                @else
                                    {{ collect($product->getAllBarcodes())->first()  }}
                                @endif
                            </td>
                            <td>{{$product->productProperties->description}}</td>
                            <td>{{$product->sing_of_subject}}</td>
                            <td>{{$product->ban_sale_retail}}</td>
                            <td>{{$product->minimal_price}}</td>
                            <td>{{$product->currency_minimal_price}}</td>
                            <td>{{$product->productProperties->country}}</td>
                            <td>{{$product->nds}}</td>
                            <td>{{$product->nalog_system}}</td>
                            <td>{{$product->provider}}</td>
                            <td>{{$product->uuid_modification_product}}</td>
                            <td>{{$product->code_modification_product}}</td>
                            <td>{{$product->is_archive}}</td>
                            <td>{{$product->productProperties->weight}}</td>
                            <td>{{$product->is_weight_product}}</td>
                            <td>{{$product->is_labeled_product}}</td>
                            <td>{{$product->productProperties->volume}}</td>
                            <td>{{$product->is_weight_product}}</td>
                            <td>{{$product->is_alcohol_product}}</td>
                            <td>{{$product->is_contains_mark}}</td>
                            <td>{{$product->container_capacity}}</td>
                            <td>{{$product->alcohol_strength}}</td>
                            <td>{{$product->code_tn_ved}}tnvd</td>
                            <td>{{$product->target_gender}}</td>
                            <td>{{$product->type_of_production}}</td>
                            <td>{{$product->code_type_product}}</td>
                            <td>{{$product->age_category}}</td>
                            <td>{{$product->is_set}}</td>
                            <td>{{$product->is_traceable}}</td>
                            <td>{{$product->productProperties->size}}</td>
                            <td>{{$product->productProperties->color}}</td>
                            <td>{{$product->productProperties->brand}}</td>
                            <td>{{$product->productProperties->structure}}</td>
                            <td>{{$product->productProperties->amount_in_a_package}} </td>
                            <td>

                                <form action="{{route('download')}}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                {{$product->productImage->link_to_packaging}}
                                    <input type="hidden" name="url"value="{{$product->productImage->link_to_packaging}}">
                                    <div class="d-flex justify-content-center">
                                <input class="btn btn-primary mt-2" type="submit"  value="Скачать">
                                    </div>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('download')}}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{$product->productImage->product_image}}
                                    <input type="hidden" name="url"value="{{$product->productImage->product_image}}">
                                    <div class="d-flex justify-content-center">
                                        <input class="btn btn-primary mt-2" type="submit"  value="Скачать">
                                    </div>
                                </form>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

