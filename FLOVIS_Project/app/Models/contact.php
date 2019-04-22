<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table = 'contacts';

    public $timestamps = false;

    protected $fillable = [
        'U_FIRST_NAME','U_LAST_NAME','U_MAIL','U_TITLE','U_CONTENT'
    ];
}
