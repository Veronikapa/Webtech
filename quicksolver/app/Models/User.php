<?php

namespace quicksolver\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class User (Model)
 * @package quicksolver
 * @author Veronika Pachatz based on
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;
    /**
     * The database table used by the model.
     *
     * @var string tablename
     */
    protected $table = 'users';
    /**
     * The attributes that can be mass-assigned to
     *
     * @var array of fillable user fields
     */
    protected $fillable = ['username', 'email', 'password', 'confirmation_code'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array of hidden user fields
     */
    protected $hidden = array('password', 'remember_token');
}