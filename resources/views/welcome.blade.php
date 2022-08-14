@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($images as $img)
                <div class="card col-md-3" >
                    <img src="{{$img->image}}" class="card-img-top" alt="" style="width: 100%;">
                    <div class="card-body">
                        <p class="card-text">
                            {{$img->text}}
                        </p>
                    </div>
                    <div class="btn-group " role="group" aria-label="Basic mixed styles example">
                        <a href="show/{{$img->id}}" class="btn btn-info">Просмотреть</a>
                        <a href="edit/{{$img->id}}" class="btn btn-warning">Изменить</a>
                        <a href="delete/{{$img->id}}" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
