<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="description" content="Laravel Application">
  <meta name="author" content="Guilherme Fontana Matoso">
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ mix('assets/css/app.css') }}">
  @yield('head')
</head>

<body class="sidebar-show">
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    
    <vue-snotify></vue-snotify>
    @include('layouts.navbar.index')
    @include('layouts.sidebar.index')
    
    <div class="main-content">
      <section class="section">
        @hasSection ('page-header')
          <div class="section-header">
            @yield('page-header')
          </div>
        @endif
        
        <div class="section-body">
          @include('layouts.flash-messages.index')
          @yield('content')
        </div>
      </section>
    </div>
    
    <footer class="main-footer">
      <div class="text-center">
        <span>{{ config('app.name') }} &copy; {{ date('Y') }}</span>
      </div>
    </footer>
  </div>
</div>

<script src="{{ mix('assets/js/manifest.js') }}"></script>
<script src="{{ mix('assets/js/vendor.js') }}"></script>
<script src="{{ mix('assets/js/app.js') }}"></script>
@yield('scripts')
</body>

</html>
