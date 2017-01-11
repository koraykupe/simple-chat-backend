<?php

namespace Chat\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function message()
    {
        return $this->hasMany('Chat\Message');
    }
}
