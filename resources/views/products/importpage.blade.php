@extends('layout')
@section('title','Импорт')
@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="row">
        <div class="col-sm">
           <h3 class="d-flex justify-content-center">
               Загрузите ваш файл xlsx
           </h3>
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                    {{session()->forget('error')}}
                </div>
            @endif
            <form action="{{route("upload")}}" method="POST" enctype=multipart/form-data>
                @csrf
            <div class="form-group">
                    <label for="excelFile">Выберите файл Excel (XLSX):</label>
                    <input type="file" id="excelFile" name="excelFile">
                </div>
                <div class="btn d-flex justify-content-center mt-5">
                    <button class="btn btn-danger" type="submit">Отправить файл</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
