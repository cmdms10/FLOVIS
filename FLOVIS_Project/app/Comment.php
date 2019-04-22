<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id','product_id','comment'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
