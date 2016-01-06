<?php
/**
 * Basic page layout
 * @author vpachatz
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quicksolver</title>

    <link rel="stylesheet" href="//bootswatch.com/yeti/bootstrap.css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>

@include('layouts.partials.nav')

<div class="container">
    @include('flash::message')

    @yield('content')
</div>
@include('layouts.partials.footer')
</body>
</html>