@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="row">
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/trumpets.jpg') }}" class="img-fluid rounded">
  </div>
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/trombone.jpg') }}" class="img-fluid rounded">
  </div>
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/frenchhorn.webp') }}" class="img-fluid rounded">
  </div>
  <div style="display: flex; justify-content: center;">
    <p class="lead">Tienda dedicada a la venta de instrumentos de viento mental</p>
  </div>
</div>
@endsection
