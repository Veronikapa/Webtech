<?php
/**
 * html of navigation bar layout
 * @author vpachatz
 */
?>
<nav class="navbar navbar-inverse navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ link_to_route('home', 'Quicksolver', [], ['class' => 'navbar-brand']) }}
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::user())
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->username }}<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li>{{ link_to_route('logout_path', 'Logout') }}</li>
                        </ul>

                    </li>
                @else
                    <li>{{ link_to_route('register_path', 'Sign Up') }}</li>
                    <li>{{ link_to_route('login_path', 'Login') }}</li>
                @endif
            </ul>
        </div>
    </div>
</nav>
