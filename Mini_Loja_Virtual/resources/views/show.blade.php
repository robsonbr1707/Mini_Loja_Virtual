@extends('layouts.main')

@section('title', 'Detalhes')
    
@section('content')
      
@if (session('msg_cart'))
    <div class="p-3 mb-2 bg-info text-dark">
        <h5 class="text-center">{{ session('msg_cart') }}</h5>
    </div>
@endif

  <div class="p-3 mb-2 bg-light text-dark">
    <h4 class="text-center">{{ ucwords($records->name_product)}}</h4>
  </div>

<section class="section">
  <div class="card" style="width: 18rem;">

    <img src="{{url("storage/images_products/{$records->image}")}}" class="card-img-top" >
      <div class="card-body">
        <h4 class="card-title color_green">R$ <strong>{{number_format($records->price, 2, ',', '.')}} </strong></h4>

        <h6 class="card-title text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
          <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg> {{ ucwords($records->description)}}</h6>

        <h6 class="card-title text-white">Avaliações: {{count($records->users)}}</h6>
        <h5 class="card-title text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 1 18 17">
          <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
        </svg><strong>{{ ucwords($name_user['name']) }} </strong></h5>

      @if(!$userLike)

    <form action="/like/{{$records->id}}" method="POST">
        @csrf
        <div class="d-grid gap-2 col-6 mx-auto mt-3">
          <a href="/like/{{$records->id}}" class="btn btn-success " id="event-submit" onclick="event.preventDefault();this.closest('form').submit();"> Gostei 
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 18">
            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
          </svg> </a>
        </div>
          
        @else
        <h6 class="color_green">Produto Já Avaliado</h6>
      @endif

    </form>
    @if (!$userCart)

    <form action="/cart/{{$records->id}}" method="POST">
      @csrf
      <div class="d-grid gap-2 col-10 mx-auto mt-2">
        <a href="/cart/{{$records->id}}" class="btn btn-warning" id="event-submit" onclick="event.preventDefault();this.closest('form').submit();">Adicionar Ao Carrinho <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart2" viewBox="0 2 14 16">
          <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
        </svg></a>
      </div>

    @else
      <h6 class="color_green">Produto Já Está No Carrinho</h6>
    @endif

    </form>
    
        
      </div>
  </div>

</section>

@endsection