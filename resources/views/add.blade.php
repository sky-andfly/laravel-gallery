@extends('template')

@section('content')
    <div class="container">
        <h2>Добавь изображение</h2>
        <form action="/store" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="">Изображение: </label>
            </div>
            <div class="form-group">
                <input type="file" name="img" id="">
            </div>
            <div class="form-group">
                <label for="">Описание:</label>
            </div>
            <div class="form-group">
                <input type="text" name="text" id="">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Загрузить</button>
        </form>
    </div>
@endsection
