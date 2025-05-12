<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $table = 'conversations';
    protected $guarded = [];


    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_email', 'email');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_email', 'email');
    }

    protected $casts = [
    'last_time_message' => 'datetime',
];

}
