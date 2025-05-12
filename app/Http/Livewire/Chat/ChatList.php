<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class ChatList extends Component
{
    protected $listeners = ['refresh'=>'$refresh'];
    public $conversations;
    public $authUser;

    public function mount()
    {
        $this->authUser = auth()->user()->email;
    }

    public function render()
    {
        $this->conversations = Conversation::where('sender_email', $this->authUser)->orWhere('receiver_email', $this->authUser)
        ->OrderBy('created_at','DESC')->get();
        return view('livewire.chat.chat-list');
    }

    public function getReceiver($conversation)
    {
        if ($conversation->sender_email === $this->authUser) {
        if (auth()->user()->role == '1') {
                return User::where('role',2)->where('email', $conversation->receiver_email)->firstOrFail();
            } else {
                return User::where('role',1)->where('email', $conversation->receiver_email)->firstOrFail();
            }

        } else {
        if (auth()->user()->role == '1') {
                return User::where('role',2)->where('email', $conversation->sender_email)->firstOrFail();
            } else {
                return User::where('role',1)->where('email', $conversation->sender_email)->firstOrFail();
            }
        }
    }

    public function openChat($conversation , $receiver)
    {

        if (auth()->user()->role == '1') {
            $receiver = User::where('role',2)->where('id', $receiver)->firstOrFail();
            $this->emitTo('chat.chat-box','chatPatientOpend', $conversation, $receiver);
            $this->emitTo('chat.send-message', 'chatPatientOpend', $conversation, $receiver);

        } else {
            $receiver = User::where('role',1)->where('id', $receiver)->firstOrFail();
            $this->emitTo('chat.chat-box','chatDoctorOpend', $conversation, $receiver);
            $this->emitTo('chat.send-message', 'chatDoctorOpend', $conversation, $receiver);


        }
    }

}
