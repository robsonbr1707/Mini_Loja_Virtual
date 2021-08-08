@extends('layouts.main')

@section('title', 'Tela Inicial')
    
@section('content')

@if(session('msg_cartDelete'))
    <div class="p-3 mb-2 bg-danger text-white">
        <h5 class="text-center">{{ session('msg_cartDelete') }}</h5>
    </div>
@endif

@if (count($records) == 0)
    <h3 class="text-center text-white">Seu Carrinho Está Vazio</h3>
    <p class="text-center" style="color:white;"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg></p>
@endif

@if (count($records) > 0)

<table class="table table-dark table-striped">
    <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col"> <h5>Nome</h5> </th>
          <th scope="col"><h5>Preço</h5></th>
          <th scope="col"></th>
        </tr>
      </thead>

    @foreach ($records as $item)

      <tbody>
        <tr>
          <th scope="row">
              <img src="{{url("storage/images_products/{$item->image}")}}" class="card-img-top" alt="{{ $item->name_product }}">
          </th>
          <td>
              <h5>{{ ucwords($item->name_product) }}</h5>
          </td>
          <td>
              <h4 class="color_green">R$ {{number_format($item->price, 2, ',', '.')}}</h4>
          </td>
          <td>
            <form action="/cart/delete/{{$item->cart_id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
                    <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                  </svg></button>
            </form>
          </td>
        </tr>
      </tbody>
     
@endforeach

</table>
  
<h3 class="text-center color_green">Total {{ number_format($totalPrice,2, ',', '.' )}}</h3>

<form action="/cart/buy/{{$user->id}}" method="POST" class="text-center">
  @csrf
  @method('DELETE')
  
  <button type="submit" class="btn btn-success btn-lg">Comprar 
    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-cart-check" viewBox="0 1 16 16">
    <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
    </svg> </button>
</form>

@endif

@endsection