@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">

  @if(!empty($viewData["products"]))
  <aside style="display: flex; justify-content: space-between">
    <div>
      @foreach($viewData['categorias'] as $categoria)
      <a class="btn btn-success" style="margin: 5px" href="{{ route('product.category.index', ['category_id'=> $categoria->getId()]) }}">{{ $categoria->getName() }}</a>
      @endforeach
    </div>
    <a class="btn btn-primary" style="margin-right: -10px" href="{{ route('product.index') }}">Ver todos los productos</a>
  </aside>
  @endif

  @foreach ($viewData["products"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card" style="display: flex; justify-content: center; align-items:center">
      <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"><img src="{{ asset('/storage/'.$product->getImage()) }}" style="width: fit-content" class="card-img-top img-card"></a>
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn bg-primary text-white">{{ $product->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach

</div>
@endsection