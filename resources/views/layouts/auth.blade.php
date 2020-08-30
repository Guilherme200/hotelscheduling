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

<body class="auth">
<div id="app">
    <section class="section">
        <div class="container">
            <div class="row d-flex align-content-center flex-column">
                <div class="col-8 col-sm-6">
                    @yield('content')
                    <div class="simple-footer">
                        <span>{{ config('app.name') }} &copy; {{ date('Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="{{ mix('assets/js/manifest.js') }}"></script>
<script src="{{ mix('assets/js/vendor.js') }}"></script>
<script src="{{ mix('assets/js/app.js') }}"></script>
@yield('scripts')
</body>

</html>
