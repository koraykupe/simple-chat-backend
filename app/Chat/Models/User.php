<?php

namespace Chat\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package Chat\Models
 */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function message()
    {
        return $this->hasMany('Chat\Models\Message');
    }
}
