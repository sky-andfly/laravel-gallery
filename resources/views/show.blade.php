@extends('template')


@section('content')
    <div class="container">
        <div class="row">
            <img src="/{{$img->image}}" alt="">
            <p>{{$img->text}}</p>
        </div>
    </div>
@endsection
