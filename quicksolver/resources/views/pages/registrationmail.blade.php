<?php
/**
 * HTML Template for User registration confirmation mail
 * @author: Veronika Pachatz based on http://bensmith.io/email-verification-with-laravel
 */
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    @include('layouts.partials.fonts')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="mailContentTable">
    <h1>Please verify your email address</h1>
    <p>
        Welcome to Quicksolver! Thank you for creating an account for quicksolver. Please click the link below to verify your email
        address: <a>{{ URL::to('register/verify/' . $confirmation_code)}}</a>
        <br>
        If you have problems, please paste the above URL into your web browser.
    </p>
 </div>
</body>
</html>