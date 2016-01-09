<?php
/**
 * Handles error messages on redirect
 * @author: vpachatz based on http://bensmith.io/email-verification-with-laravel
 */
?>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif