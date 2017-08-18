<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Email extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'e_id', 'user_id', 'password','company_email','company_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
