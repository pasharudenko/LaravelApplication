<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'comment_id',
        'body',
        'is_active'
    ];
    protected $table = 'replies';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

}
