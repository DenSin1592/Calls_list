<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\User', 'contact_user');
    }
}


