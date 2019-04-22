<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $fillable = [
        'user_id', 'cardNum', 'securityCode', 'expirationMonth', 'expirationYear', 'name'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
