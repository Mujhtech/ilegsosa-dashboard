<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageThread extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(Messaging::class, 'message_id', 'id');
    }
}
