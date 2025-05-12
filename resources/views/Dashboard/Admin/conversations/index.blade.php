@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
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

@foreach($conversations as $conv)
    <div class="card mb-2">
        <div class="card-body">
            <strong>المحادثة رقم: {{ $conv->id }}</strong><br>
            من: {{ $conv->sender->name }} ({{ $conv->sender->role == 1 ? 'طبيب' : 'مريض' }})<br>
            إلى: {{ $conv->receiver->name }} ({{ $conv->receiver->role == 1 ? 'طبيب' : 'مريض' }})<br>
            <a href="{{ route('chat.show', $conv->id) }}">عرض المحادثة</a>
        </div>
    </div>
@endforeach


@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
