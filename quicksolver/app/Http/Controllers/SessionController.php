<?php

namespace quicksolver\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Validator, Redirect;
use View, Hash, Mail;
use Illuminate\Support\Facades\Auth;
/**
 * Controller for user session
 * @author: Veronika Pachatz based on http://bensmith.io/email-verification-with-laravel
 */

class SessionsController extends Controller {

    /**
     * Show the login form.
     * GET /sessions/create
     *
     * @return view to show
     */
    public function create()
    {
        return View::make('pages.login');
    }
    /**
     * Attempt to log a user in
     * POST /sessions
     *
     * @return redirection path
     */
    public function store()
    {
        /*
         * Validate login with rules
         */
        $rules = [
            'username' => 'required|exists:users',
            'password' => 'required'
        ];

        $validator = Validator::make(Input::only('username', 'email', 'password'), $rules);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }

        $credentials = [
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'confirmed' => 1
        ];

        /*
         * Try login
         */
        if (! Auth::attempt($credentials))
        {
            return Redirect::back()->withInput()->withErrors(['credentials' => 'Sorry, we were unable to sign you in. Please ensure that your account exists and is confirmed!']);
        }

        return Redirect::home();
    }
    /**
     * Log a user out
     *
     * @return redirection path
     */
    public function destroy()
    {
        Auth::logout();
        return Redirect::home();
    }

}