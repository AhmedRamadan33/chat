<div class="main-chat-list" id="ChatList">
    @foreach ($conversations as $conversation)
            <div class="media new"
                wire:click="openChat({{ $conversation }},'{{ $this->getReceiver($conversation)->id }}')">
                <div class="main-img-user online">
                    <img alt="" src="{{ URL::asset('Dashboard/img/avatar2.png') }}"> <span>2</span>
                </div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>{{ $this->getReceiver($conversation)->name }}</span>
                        <span>{{ $conversation->messages->last()->created_at->shortAbsoluteDiffForHumans() }}</span>
                    </div>
                    <p>{{ $conversation->messages->last()->body }}</p>
                </div>
            </div>
    @endforeach

</div><!-- main-chat-list -->
