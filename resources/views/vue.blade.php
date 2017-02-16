<html>
<head>
    <!-- Styles -->
    @section('styles')
        @include('partials.base')
    @show
    <title>Paint Me</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
  @include('partials.nav')
      <div class="container-fluid" :style="bgColor">
        <div class="centered">
          <h1>Paint this background!</h1>
          <input type="color" v-model="bgColor.backgroundColor" />
        </div>
      </div>
</body>
<script src="/js/app.js"></script>
<style type="text/css">
    .centered {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-top: -50px;
        margin-left: -100px;
    }
    .container-fluid {
      width: 100%;
      height: 100%
    }
</style>
</html>