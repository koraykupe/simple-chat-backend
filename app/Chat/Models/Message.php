<?php

namespace Chat\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'user_id', 'is_read'
    ];

    public function user()
    {
        return $this->belongsTo('Chat\User');
    }
}
