<?php

namespace Chat\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * @package Chat\Models
 */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Chat\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function targetUser()
    {
        return $this->belongsTo('Chat\Models\User', 'target_user_id');
    }
}
