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

        $messages = Message::with('sender')->where('conversation_id', $conversation->id)->where('is_deleted',0)->get();
        return view('Dashboard.Admin.conversations.show', compact('conversation', 'messages'));
    }


    public function destroyUserMessages($id)
    {

        $message = Message::findOrFail($id);

        if ($message->sender_email != auth()->user()->email) {
            abort(403, 'غير مصرح');
        }

        $message->is_deleted = true;
        $message->save();
        return redirect()->back();
    }


    public function destroyAdminMessages($id)
    {
        try {
            $message = Message::findOrFail($id);

            $message->is_deleted = true;
            $message->save();

            return response()->json(['success' => true, 'message' => 'تم إخفاء الرسالة بنجاح']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroyAdminChat($id)
    {
        $conversation = Conversation::findOrFail($id);
        if ($conversation->sender_email == auth()->user()->email) {
            abort(403, 'غير مصرح');
        }
        $conversation->delete();
        return redirect()->back()->with('success', 'تم حذف المحادثة بنجاح');
    }
}
