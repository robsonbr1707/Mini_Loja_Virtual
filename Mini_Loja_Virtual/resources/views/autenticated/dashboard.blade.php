@extends('layouts.main')

@section('title', 'Produtos')
    
@section('content')

@if (session('msg_create'))
    <div class="p-3 mb-2 bg-success text-white">
        <h5 class="text-center">{{ session('msg_create') }}</h5>
    </div>

    @elseif(session('msg_update'))
    <div class="p-3 mb-2 bg-primary text-white">
        <h5 class="text-center">{{ session('msg_update') }}</h5>
    </div>

    @elseif(session('msg_delete'))
    <div class="p-3 mb-2 bg-danger text-white">
        <h5 class="text-center">{{ session('msg_delete') }}</h5>
    </div>
@endif

<div class="p-3 mb-2 bg-light text-dark">
    <h4 class="text-center">Meus Produtos</h4>
</div>

@if (count($records) == 0)
    <h4 class="text-center text-white">Você Ainda não possui nenhum produto<a href="/create" class="nav-link link-success"> Criar Um Produto</a>
    </h4>
@endif

<section class="section">
    
    @foreach ($records as $item)

    <div class="card" style="width: 18rem;">
        <img src="{{url("storage/images_products/{$item->image}")}}" class="card-img-top" >
        <div class="card-body">
          <h5 class="card-title text-white"> {{ ucwords($item->name_product) }} </h5>
          <h4 class="card-title color_green">R$ <strong>{{ number_format($item->price, 2, ',', '.') }} </strong> </h4>
          <form action="{{$item->id}}" method="POST">
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg> Deletar</button>
                <a href="/edit/{{$item->id}}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg> Editar</a>
          </form>
        </div>
    </div>
@endforeach

</section>

@endsection