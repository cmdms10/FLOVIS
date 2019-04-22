<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_account extends Model
{

    protected $table = 'user_accounts';

    public $timestamps = false;

    protected $fillable = [
        'U_ID','U_FIRST_NAME','U_LAST_NAME','U_FIRST_kanaNAME','U_LAST_kanaNAME','U_PW','U_MAIL','U_FIRST_ZIP','U_LAST_ZIP','U_PREFECTURES','U_LOCAL','U_ADDR','U_TEL'
    ];

}