@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4" style="display: flex; align-items: center; justify-content: center">
      <img src="{{ asset('/storage/'.$viewData['product']->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getPrice() }})
        </h5>
        <p class="card-text">{{ $viewData["product"]->getDescription() }}</p>
        <p class="card-text">
        <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
          <div class="row">
            @csrf
            <div class="col-auto">
              <div class="input-group col-auto">
                <div class="input-group-text">{{__('Quantity')}}</div>
                <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
              </div>
            </div>
            <div class="col-auto">
              <button class="btn bg-primary text-white" type="submit">{{__('Add to cart')}}</button>
            </div>
          </div>
        </form>
        </p>
      </div>
    </div>
  </div>
</div>

<!--                   COMENTARIOS                      -->
@guest
<h2>{{__('Login or create an account to write a comment')}}</h2>
<a class="btn btn-primary" href="{{ route('login') }}">{{__('Login')}}</a>
<a class="btn btn-primary" href="{{ route('register') }}">{{__('Register')}}</a>
@else
<section style="background-color: #d94125;">
  <div class="container my-5 py-5 text-dark">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-6">
        <div class="card">
          <div class="card-body p-4">
            <div class="d-flex flex-start w-100">
              <div class="w-100">
                <h5>{{__('Add a comment')}}</h5>
                <!--<ul class="rating mb-3" data-mdb-toggle="rating">
                  <li>
                    <i class="far fa-star fa-sm text-danger" title="Bad"></i>
                  </li>
                  <li>
                    <i class="far fa-star fa-sm text-danger" title="Poor"></i>
                  </li>
                  <li>
                    <i class="far fa-star fa-sm text-danger" title="OK"></i>
                  </li>
                  <li>
                    <i class="far fa-star fa-sm text-danger" title="Good"></i>
                  </li>
                  <li>
                    <i class="far fa-star fa-sm text-danger" title="Excellent"></i>
                  </li>
                </ul>-->
                <form action="{{ route('comment.store')}}" method="POST">
                  @csrf
                  <div class="form-outline">
                    <textarea class="form-control" class="comment" id="comment" name="comment" rows="4"></textarea>
                    <label class="form-label" for="textAreaExample">{{__('What is your view?')}}</label>
                  </div>
                  <!--<input type="hidden" name="userId" value="{{ Auth::id() }}">
                  <input type="hidden" name="username" value="{{ Auth::user()->name }}">-->
                  <input type="hidden" name="productId" value="{{ $viewData['product']->getId() }}">
                  <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-danger">
                      {{__('Send')}}
                    </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<!--                  LISTA DE COMENTARIOS                      -->


<div class="row d-flex justify-content-center mt-100 mb-100">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body text-center">
        <h4 class="card-title">{{__('Latest Comments')}}</h4>
      </div>
      <div class="comment-widgets">
        <!-- Comentario -->
        @foreach($viewData['comments']->reverse() as $comment)
        <div class="d-flex flex-row comment-row m-t-0">
          <div class="comment-text w-100" style="margin: 10px;padding: 5px; background-color: #E8E5DA">
            <h6 class="font-medium">{{ $comment->getUserName() }}</h6>
            <span class="m-b-15 d-block">{{ $comment->getComment() }}</span>
            <div class="comment-footer">
              <span class="text-muted float-right">{{ $comment->getCreatedAt() }}</span>
              @if(Auth::id() == $comment->getUserId())
              <a href="{{ route('comment.delete', ['id'=> $comment->getId()]) }}">
                <button type="button" class="btn btn-danger btn-sm">{{__('Delete')}}</button>
              </a>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endguest
@endsection