@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
  {{__('Create Categorys')}}
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{__('Name')}}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ old('name') }}" type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>
      
      <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
  {{__('Manage Categories')}}
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
        <th scope="col">{{__('Category ID')}}</th>
          <th scope="col">{{__('Name')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["categories"] as $category)
        <tr>
          <td>{{ $category->getId() }}</td>
          <td>{{ $category->getName() }}</td>
          <td>
            <a class="btn btn-primary" href="{{route('admin.category.edit', ['id'=> $category->getId()])}}">
              <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.category.delete', $category->getId())}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">
                <i class="bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
