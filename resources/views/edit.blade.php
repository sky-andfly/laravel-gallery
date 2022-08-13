@extends('template')
<style>
    .my__image{
        width: 300px!important;
        height: 500px;
    }
</style>
@section('content')
    <div class="container">
        <h2>Добавь изображение</h2>
        <form action="/update/{{$img->id}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <img class="my__image" src="/{{$img->image}}" alt="">
                <p>{{$img->text}}</p>
            </div>

            <div class="form-group">
                <input type="file" name="img" id="">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Обновить</button>
        </form>
    </div>
@endsection
