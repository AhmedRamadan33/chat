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
    <div class="card mb-3 shadow-sm border-0 rounded-2">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-2">
                    <i class="fas fa-comments text-primary"></i> المحادثة رقم: {{ $conv->id }}
                </h5>
                <p class="mb-1">
                    <strong>من:</strong> {{ $conv->sender->name }} 
                    <span class="badge badge-info">{{ $conv->sender->role == 1 ? 'طبيب' : 'مريض' }}</span>
                </p>
                <p class="mb-2">
                    <strong>إلى:</strong> {{ $conv->receiver->name }} 
                    <span class="badge badge-secondary">{{ $conv->receiver->role == 1 ? 'طبيب' : 'مريض' }}</span>
                </p>
            </div>
            <div class="text-right">
                <a href="{{ route('chat.show', $conv->id) }}" class="btn btn-sm btn-primary mb-2">
                    <i class="fas fa-eye"></i> عرض
                </a>
                <form action="{{ route('AdminChat.destroy', $conv->id) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذه المحادثة؟')">
                        <i class="fas fa-trash-alt"></i> حذف
                    </button>
                </form>
            </div>
        </div>
    </div>
@endforeach


@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
