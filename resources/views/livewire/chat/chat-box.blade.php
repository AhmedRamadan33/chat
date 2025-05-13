<div>
    @if ($chatSelected)
        <div class="main-content-body main-content-body-chat">
            <div class="main-chat-header">
                <div class="main-img-user"><img alt="" src="{{ URL::asset('Dashboard/img/avatar2.png') }}">
                </div>
                <div class="main-chat-msg-name">
                    <h6>{{ $receiver->name }} </h6>
                </div>

            </div><!-- main-chat-header -->
            <div class="main-chat-body" id="ChatBody">
                <div class="content-inner">
                    @foreach ($messages as $message)
                        <div class="media {{ $message->sender_email == $authUser->email ? 'flex-row-reverse' : '' }}">
                            <div class="main-img-user online"><img alt=""
                                    src="{{ URL::asset('Dashboard/img/avatar2.png') }}">
                            </div>
                            <div class="media-body">
                                <div class="main-msg-wrapper right">
                                    @if ($message->is_deleted)
                                        <em class=" text-default">تم حذف الرسالة</em>
                                    @else
                                        {{ $message->body }}

                                        {{-- أيقونة الحذف --}}
                                        @if ($message->sender_email == $authUser->email)
                                            <form method="POST" action="{{ route('UserMessages.destroy', $message->id) }}"
                                                onsubmit="return confirm('هل أنت متأكد من حذف الرسالة؟')"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm text-danger"
                                                    title="حذف الرسالة" style="border: none; background: transparent;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endif

                                </div>
                                <div>
                                    <span>{{ $message->created_at->shortAbsoluteDiffForHumans() }}</span> <a
                                        href=""><i class="icon ion-android-more-horizontal"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif
</div>
