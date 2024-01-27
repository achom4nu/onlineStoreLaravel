@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    {{__('Edit Product')}}
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{__('Name')}}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ $viewData['product']->getName() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{__('Price')}}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ $viewData['product']->getPrice() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{__('Image')}}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input class="form-control" type="file" name="image">
            </div>
          </div>
        </div>
        <div class="col">
          &nbsp;
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">{{__('Description')}}:</label>
        <textarea class="form-control" name="description"
          rows="3">{{ $viewData['product']->getDescription() }}</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">{{__('Category')}}</label>
        <select class="form-select form-select-lg" name="category" id="category">
          @foreach($viewData['categorias'] as $categoria)
          <option name='{{ $categoria->getId() }}' value="{{ $categoria->getId() }}">{{ $categoria->getName() }}</option>
          @endforeach
        </select>
        <a href="{{ route('product.index') }}"></a>
      </div>
      <button type="submit" class="btn btn-primary">{{__('Edit')}}</button>
    </form>
  </div>
</div>
@endsection