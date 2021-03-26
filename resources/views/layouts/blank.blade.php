<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield("title_page") - {{config('app.name')}} </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css" />

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



</head>
<body class="hold-transition login-page">

    @yield('content')

    <script src="{{asset("js/sparkline.js")}}"></script>

    <script src="{{asset("js/moment.min.js")}}"></script>
    <script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

</body>
</html>

