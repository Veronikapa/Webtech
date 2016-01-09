<?php
namespace quicksolver\Http\Controllers;

use Illuminate\Support\Facades\Input;
use quicksolver\Models\User;
use Validator, Redirect;
use View, Hash, Mail, Session;

/**
 * Controller for user registration
 * @author vpachatz based on http://bensmith.io/email-verification-with-laravel
 */
class RegistrationController extends Controller {
    /**
     * Show the view 'registration'
     *
     * @return Response
     */
    public function create()
    {
        return View::make('pages.registration');
    }

    /**
     * Create a new quicksolver user if validation of user data succeeds.
     * Confirmation mail with confirmation code is send to new user.
     *
     * @return link to redirect after validation of user data
     */
    public function store()
    {
        /*
         * Rules for user data
         */
        $rules = [
            'username' => 'required|min:6|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ];

        /*
         * Validation of input data based on validation rules
         */
        $validator = Validator::make(Input::only('username', 'email', 'password', 'password_confirmation'), $rules);
        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }

        // Confirmation code is a random value
        $confirmation_code = str_random(30);

        /*
         * User will be created in db, when data is valid
         */
        User::create([
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'confirmation_code' => $confirmation_code
        ]);

        /*
         * Mail based on view 'registrationmail' including the confirmation code will be sent to user
         */
        Mail::send('pages.registrationmail', compact('confirmation_code'), function($message)
        {
            $message->to(Input::get('email'))->subject('Confirm your Quicksolver account!');
        });

        /*
         * Redirect user to home - page and show flash message for information
         */
        Session::flash('message', 'Thanks for signing up to Quicksolver! Please check your mails and follow the instructions to complete the sign up procedure');
        return Redirect::home();
    }

    /**
     * Method to check confirmation of a users account.
     *
     * @param $confirmation_code of email
     *
     * @throws InvalidConfirmationCodeException
     * @return redirection path
     */
    public function confirm($confirmation_code)
    {
        /*
         * Check if the given confirmation code is a valid confirmation code of a user.
         *
         */
        if(! $confirmation_code)
        {
            return Redirect::home();
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if (! $user)
        {
            return Redirect::home();
        }

        /*
         * If confirmation code is correct, set user to confirmed. User can login now.
         */
        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        // Login page will be displayed after successful confirmation
        Session::flash('message','You have successfully verified your account. You can now login into Quicksolver!');
        return Redirect::route('login_path');
    }
}