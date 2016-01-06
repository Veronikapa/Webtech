<?php

namespace quicksolver\Http\Controllers;
/**
 * Controller for user session
 * @author: Veronika Pachatz based on http://bensmith.io/email-verification-with-laravel
 */

class SessionsController extends \Controller {

    public function __construct()
    {
        $this->beforeFilter('guest', ['except' => ['destroy']]);
        $this->beforeFilter('auth', ['only' => ['destroy']]);
    }
    /**
     * Show the login form.
     * GET /sessions/create
     *
     * @return view to show
     */
    public function create()
    {
        return View::make('sessions.create');
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
            return Redirect::back()->withInput()->withErrors($validator);
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
            return Redirect::back()->withInput()->withErrors(['credentials' => 'Sorry, we were unable to sign you in.']);
        }

        Flash::message('Welcome back!');
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