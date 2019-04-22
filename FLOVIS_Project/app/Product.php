<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'market_id','title','description','price','material','height','width','main_image','second_image','third_image','fourth_image',
    ];

    public function market() {
        return $this->belongsTo(Market::class);
    }
}
