<?php

namespace App\Events;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PatientMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $receiver;
    public $message;
    public $conversation;

    public function __construct(User $sender, User $receiver, Message $message, Conversation $conversation)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->message = $message;
        $this->conversation = $conversation;
    }

    public function broadcastWith()
    {
        return [
            'sender_email' => $this->sender->email,
            'receiver_email' => $this->receiver->email,
            'message' => $this->message->id,
            'conversation_id' => $this->conversation->id
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('patientChat.'.$this->receiver->id);
    }
}
