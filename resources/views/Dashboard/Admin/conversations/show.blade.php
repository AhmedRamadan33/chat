@extends('Dashboard.layouts.master')

@section('css')
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

    @push('styles')
        <style>
            .messages {
                max-height: 500px;
                overflow-y: auto;
                margin-bottom: 20px;
            }

            .message {
                border-radius: 10px;
                padding: 15px;
                margin-bottom: 10px;
                position: relative;
            }

            .message.sent {
                background-color: #e1ffe1;
                border-left: 5px solid #28a745;
            }

            .message.received {
                background-color: #f1f1f1;
                border-left: 5px solid #17a2b8;
            }

            .message-header {
                font-weight: bold;
                font-size: 1.1em;
            }

            .message-time {
                font-size: 0.9em;
                color: #888;
            }

            .delete-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                background: none;
                border: none;
                color: red;
                font-size: 1.2em;
                cursor: pointer;
            }

            .delete-btn:hover {
                color: #dc3545;
            }

            .message-body {
                font-size: 1em;
                line-height: 1.5;
            }
        </style>
    @endpush
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/
                    Chat</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- بيانات المحادثة -->
                <h3 class=" "> : تفاصيل المحادثة </h3>
                <h3>
                    @if ($conversation->sender->role == 1)
                        <span class="badge badge-info">طبيب</span>
                    @else
                        <span class="badge badge-secondary">مريض</span>
                    @endif
                    {{ $conversation->sender->name }}
                </h3>

                <h3>
                    @if ($conversation->receiver->role == 1)
                        <span class="badge badge-info">طبيب</span>
                    @else
                        <span class="badge badge-secondary">مريض</span>
                    @endif
                    {{ $conversation->receiver->name }}
                </h3>
                <p>التاريخ: {{ $conversation->created_at->format('d/m/Y H:i') }}</p>
                <p>آخر رسالة تم إرسالها:
                    {{ $conversation->last_time_message ? $conversation->last_time_message->format('d/m/Y H:i') : 'لا توجد رسائل بعد' }}
                </p>

                <hr>

                <!-- عرض الرسائل -->
                <div class="messages">
                    @foreach ($messages as $message)
                        <div id="message-{{ $message->id }}"
                            class="message @if ($message->sender_id == auth()->user()->id) sent @else received @endif">
                            <button class="btn btn-sm btn-danger" onclick="deleteMessage({{ $message->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <div class="message-header">
                                <strong>{{ $message->sender->name }}:</strong>
                                <span class="message-time">{{ $message->created_at->format('H:i') }}</span>
                            </div>
                            <div class="message-body">                               
                                {{ $message->body }}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
        function deleteMessage(messageId) {
            if (confirm('هل أنت متأكد من إخفاء هذه الرسالة؟')) {
                fetch('{{ route('AdminMessages.destroy', '') }}/' + messageId, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('تم إخفاء الرسالة');
                            document.getElementById('message-' + messageId).remove();
                        } else {
                            alert('حدث خطأ أثناء إخفاء الرسالة');
                        }
                    })
                    .catch(error => {
                        console.error('خطأ:', error);
                        alert('حدث خطأ أثناء الاتصال بالخادم');
                    });
            }
        }
    </script>
@endsection
