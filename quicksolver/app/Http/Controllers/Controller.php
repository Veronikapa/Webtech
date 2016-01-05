<?php

namespace quicksolver\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;

/**
 * Class Controller
 * @package quicksolver\Http\Controllers
 * @author Veronika Pachatz based on http://bensmith.io/email-verification-with-laravel
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Setup the layout used by the controllers.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
        View::share('currentUser', Auth::user());
    }
}
