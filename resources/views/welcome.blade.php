@extends('layout.app')
@section('content')
<section>
    <div class="container">
        <img class="mx-auto w-100 my-5" src="{{asset('img/seccion-catalogo.png')}}" alt="acordion">
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                @include('components.grid', ["premios" => $premios , "catalogos" => $catalogos, "categorias" => $categorias, "puntos" => $puntos])
            </div>
            <div class="col-12 col-lg-4">
                @include('components.list')
            </div>
        </div>
    </div>
</section>
@endsection
