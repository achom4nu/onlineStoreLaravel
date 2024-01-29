<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title')</title>

</head>

<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      @include('partials/language_switcher')
      <a class="navbar-brand" style="margin-left: 30px;" href="{{ route('home.index') }}">{{__('Online Store')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{ route('home.index') }}">{{__('Home')}}</a>
          <a class="nav-link active" href="{{ route('product.index') }}">{{__('Products')}}</a>
          <a class="nav-link active" href="{{ route('cart.index') }}">{{__('Cart')}}</a>
          <a class="nav-link active" href="{{ route('home.about') }}">{{__('About')}}</a>
          @guest 
          @else
          @if(Auth::user()->role == "admin")
          <a class="nav-link active" style="color: gold;" href="{{ route('admin.home.index') }}">{{__('Administrattor Panel')}}</a>
          @endif
          @endguest
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active" href="{{ route('login') }}">{{__('Login')}}</a>
          <a class="nav-link active" href="{{ route('register') }}">{{__('Register')}}</a>
          @else
          <a class="nav-link active" href="{{ route('myaccount.orders') }}">{{__('My Orders')}}</a>
          <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">{{__('Logout')}}</a>
            @csrf
          </form>
          @endguest
        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle')</h2>
    </div>
  </header>
  <!-- header -->

  <div class="container my-4">
    @yield('categories')
  </div>

  <div class="container my-4">
    @yield('content')
  </div>

  <div class="container my-4">
    @yield('idioma')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright -
        <strong>Manuel Guillén</strong>
      </small>
    </div>
  </div>
  <!-- footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  
</body>

</html>