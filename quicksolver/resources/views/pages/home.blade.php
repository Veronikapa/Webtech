@extends('layouts.default')

@section('content')
    <div class="container">
        <div class = "welcomeMain">
            <br><br><br>
            <h1>Welcome to Quicksolver!</h1>
            <h4>
                Your website for fast file execution!
            </h4>
            <br>
                <p>
                    {{ link_to_route('register_path', 'Sign Up Now', null, ['class' => 'btn btn-lg btn-primary']) }}
                </p>
                <br><br>
        </div>
        <div class ="welcomeText">
            <br>
            <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>

@stop