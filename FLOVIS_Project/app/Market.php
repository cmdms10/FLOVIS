<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = [
        'name', 'mail', 'phone', 'tag', 'url', 'zipcode', 'address1', 'address2', 'address3', 'first_name', 'last_name', 'first_kanasei', 'last_kanamei',

    ];


}
