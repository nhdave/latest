<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <style>
        body {
                background: url(http://home.nhdave.com/images/55252.jpg) no-repeat center fixed; 
                background-size: cover;
              }
        </style>
    @section('styles')
        @include('partials.base')
    @show
    <!-- Scripts -->
    @section('scripts')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @show
</head>
<body>
  <div class="container" id="app">
    
  
    @include('partials.nav')
      <div class="row">
        <br><br><br>
          @section('top')
            <h4 align="center"> <strong>{{ date('l jS \of F Y h:i:s A') }}</strong> </h4>
          @show
          
        </div>
      <div id="app" class="container">
        
      
        
        <div class="page-header clearfix" align="center">
           <img src="http://home.nhdave.com/images/dave.png" alt="What a difference a Dave makes!!"> 
           <h1>@yield('header')</h1>
        </div>
      
        
    
        <div class="row">
          @if (session('message'))
          <div class="col-xs-8 col-xs-offset-2">
            <div class="alert alert-info">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('message') }}
            </div>
          </div>
          @endif
        </div>
        
        
        @yield('content')
        
        
      
      
        
      </div>
  <br><br>
    <div class="row">
      <div class="navbar navbar-inverse navbar-fixed-bottom" align="center"> 
        @section('footer')
            <p>
            <a href="https://laravel.com/docs" target="_blank">Documentation &nbsp;</a>
            <a href="https://laracasts.com" target="_blank">&nbsp; Laracasts &nbsp;</a>
            <a href="https://laravel-news.com" target="_blank">&nbsp; News &nbsp;</a>
            <a href="https://forge.laravel.com" target="_blank">&nbsp; Forge &nbsp;</a>
            <a href="https://github.com/laravel/ laravel" target="_blank">&nbsp;GitHub&nbsp; &nbsp; &nbsp;</a>
            </p>
        @show
      </div>
  </div>
  </div>
    
  </body>
        <!-- Scripts -->
        <script src="/js/app.js"></script>
        


</html>
