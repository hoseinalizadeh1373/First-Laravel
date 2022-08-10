<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo</title>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="bg-light">


  <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex p-2  justify-content-sm-start ">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active border rounded border-light mx-2 ">
          <a class="nav-link text-dark" href="{{Route('todos.index')}}">صفحه اصلی <span class="sr-only">(current)</span></a>
        </li>
        @can('update',Auth::user())
        <li class="nav-item border rounded border-light mx-2">
          <a class="nav-link text-dark" href="{{Route('users.index')}}">کاربران</a>
        </li>
        @endcan
        <li class="nav-item border rounded border-light mx-2">
          <a class="nav-link text-dark" href="#">درباره ما</a>
        </li>
      </ul>

    </div>
    <ul class="navbar-nav ml-5 pl-5">
      <!-- Authentication Links -->
      @guest
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('ورود') }}</a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('عضویت') }}</a>
      </li>
      @endif
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning btn btn-outline rounded border-dark px-2 text-center bg-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }} <span class="caret "></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        
          <li class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            {{ __('خروج') }}
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </ul>
      </li>
      @endguest
    </ul>
    </div>
  </nav>
