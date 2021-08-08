@extends('layouts.main')

@section('title', 'Tela Inicial')
    
@section('content')

<form class="d-flex" action="/" method="GET">
    @csrf
    <input class="form-control me-2" type="search" name="search" placeholder="Pesquise por algum produto" aria-label="Search">
    <button class="btn btn-success" type="submit">Buscar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg></button>
</form>

    @if ($search)
        <h4 class="text-center text-white">Buscando Por: <strong>{{ ucwords($search) }} </strong></h4>

    @elseif(session('msg_buyProduct'))
        <div class="p-3 mb-2 bg-success text-white">
            <h5 class="text-center">{{ session('msg_buyProduct') }}</h5>
        </div>
    @endif

<div id="carousel-box">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="imagens/gtx1660.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="imagens/processador_i3.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="imagens/ryzen.jpg" class="d-block w-100" alt="...">
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</div>    
    
    @if (count($records) == 0)
        <h4 class="text-center text-white">Nenhum Produto Existente</h4>
    @endif

<section class="section">
    @foreach ($records as $item)

    <div class="card" style="width: 18rem;">
        <img src="{{url("storage/images_products/{$item->image}")}}" class="card-img-top" alt="{{ $item->name_product }}">
        <div class="card-body">
          <h5 class="card-title text-white">{{ ucwords($item->name_product) }}</h5>
          <h4 class="card-title color_green">R$ {{number_format($item->price, 2, ',', '.')}}</h4>
          <div class="d-grid gap-2 col-10 mx-auto mt-3">
            <a href="{{ route('index.show', $item->id) }}" class="btn btn-primary">Saíba Mais</a>
          </div>
        </div>
    </div>
@endforeach

</section>
    
@endsection
