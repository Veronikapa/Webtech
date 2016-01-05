<?php
/**
 * Created by PhpStorm.
 * User: Veronika
 * Date: 05.01.2016
 * Time: 14:05
 */
 ?>

@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h1>Sign In!</h1>

            {{ Form::open(['route' => 'login_path']) }}

                    <!--- Username Field --->
            <div class="form-group">
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) }}
            </div>
            <!--- Password Field --->
            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
            </div>
            <!--- Sign In Field --->
            <div class="form-group">
                {{ Form::submit('Sign In', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop
