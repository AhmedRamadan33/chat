@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

    @push('styles')
    <style>
        .messages {
            max-height: 500px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .message {
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        .message.sent {
            background-color: #e1ffe1;
        }

        .message.received {
            background-color: #f1f1f1;
        }

        .message-header {
            font-weight: bold;
        }

        .message-time {
            font-size: 0.9em;
            color: #888;
        }
    </style>
@endpush
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ Chat</span>
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
                <h3>محادثة بين: 
                    {{ $conversation->sender->name }} 
                    @if($conversation->sender->role == 1) 
                    @else
                    @endif
                    -
                    {{ $conversation->receiver->name }} 
                    @if($conversation->receiver->role == 1) 
                    @else
                    @endif
                </h3>
                <p>التاريخ: {{ $conversation->created_at->format('d/m/Y H:i') }}</p>
                <p>آخر رسالة تم إرسالها: {{ $conversation->last_time_message ? $conversation->last_time_message->format('d/m/Y H:i') : 'لا توجد رسائل بعد' }}</p>

                <hr>

                <!-- عرض الرسائل -->
                <div class="messages">
                    @foreach($messages as $message)
                        <div class="message @if($message->sender_id == auth()->user()->id) sent @else received @endif">
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
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
