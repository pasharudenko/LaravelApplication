<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'is_active',
        'body'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
