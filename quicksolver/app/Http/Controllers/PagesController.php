<?php

namespace quicksolver\Http\Controllers;

use quicksolver\Http\Controllers\Controller;
use View;

/**
 * Class PagesController
 * @author Veronika Pachatz based on http://bensmith.io/email-verification-with-laravel
 */
class PagesController extends Controller {

    public function home()
    {
        return View::make('home');
    }
}