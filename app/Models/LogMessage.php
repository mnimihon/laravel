<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogMessage extends Model
{
    protected $fillable = [
        'message_id',
        'message_text',
        'user_id',
        'deleted_by'
    ];

    protected $casts = [
        'deleted_at' => 'datetime'
    ];
}
