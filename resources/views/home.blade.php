@extends('layouts.layout_home')

@section('title')
    <title>HOME - ✒ EL BLOGUERITO</title>
@endsection

@section('content')
    <div class="container">
        @include('header')
        <p class="fs-3">Disfruta de un blog lleno de interesante noticias, para que tengas la información más
            confiable a un solo click</p>
        @include('grid_news')
    </div>
@endsection
