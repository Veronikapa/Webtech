@extends('layouts.default')

@section('content')

    <div class="container">
        <div class = "home">
            <h1>Welcome to Quicksolver!</h1>
            <p>
                Your website for fast file execution!
            </p>
                <p>
                    {{ link_to_route('register_path', 'Sign Up Now', null, ['class' => 'btn btn-lg btn-primary']) }}
                </p>
        </div>
    </div>

@stop