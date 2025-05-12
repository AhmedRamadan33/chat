<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function allConversations()
    {
        if (auth()->user()->role != 3) {
            abort(403, 'غير مصرح');
        }

        $conversations = Conversation::with(['sender', 'receiver'])->get();

        return view('Dashboard.Admin.conversations.index', compact('conversations'));
    }

    public function show(Conversation $conversation, $id)
    {
        $conversation = Conversation::with(['sender', 'receiver'])->findOrFail($id);

        $messages = Message::with('sender')->where('conversation_id', $conversation->id)->get();
        return view('Dashboard.Admin.conversations.show', compact('conversation', 'messages'));
    }
}
