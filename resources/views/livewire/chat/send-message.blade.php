<div>
    @if ($conversation)
        <form wire:submit.prevent="sendMessage">
            <div class="main-chat-footer">
                <input class="form-control" placeholder="Type your message here..." type="text" wire:model="message">
                <button type="submit" class="main-msg-send border-0 bg-white"><i class="far fa-paper-plane"></i></button>
            </div>
        </form>
    @endif

</div>
