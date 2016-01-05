@extends('layouts.default')

@section('content')

    <div class="jumbotron">
        <h1>Email Verification Tutorial</h1>
        <p>
            Welcome to the premiere email verification demo application.
        </p>
            <p>
                {{ link_to_route('register_path', 'Sign Up', null, ['class' => 'btn btn-lg btn-primary']) }}
            </p>
    </div>

@stop