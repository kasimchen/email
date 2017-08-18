<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Email extends Model
{

    protected $table ='email';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'e_id', 'user_id', 'date','subject','fromName','fromAddress','to','cc','replyTo','textPlain','textHtml','attachment',
    ];


}
