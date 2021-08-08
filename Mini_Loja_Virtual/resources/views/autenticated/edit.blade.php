@extends('layouts.main')

@section('title', 'Editando Registro')
    
@section('content')

<section class="section">
    <img src="{{url("storage/images_products/{$records->image}")}}" alt="" style="height:190px;" class="pt-3">
</section>

<form action="/update/{{ $records->id }}" method="POST" class="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label text-white">Nome Do Produto</label>
        <input type="text" name="name_product" class="form-control @error('name_product') is-invalid @enderror" placeholder="Ex:Intel Core i3, Placa De Video Rx 560.." value="{{$records->name_product}}">
        @error('name_product')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong> 
            </div>  
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label text-white" >Descrição Do Produto</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Faça uma descrição do produto">
            {{ $records->description }}
        </textarea>
        @error('description')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong> 
            </div>  
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Valor Do Produto</label>
        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Não é necessario ponto, ou virgula.." value="{{ $records->price }}">
        @error('price')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong> 
            </div>  
        @enderror
    </div>

    <div class="input-group">
        <input type="file" name="image" class="form-control pt-3 pb-3 @error('image') is-invalid @enderror">
        @error('image')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong> 
            </div>  
        @enderror
    </div>
        <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
</form>

@endsection
