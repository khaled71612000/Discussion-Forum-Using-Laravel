@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Notifications</div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($notifications as $notification)
                    <li class="list-group-item">
                        @if($notification->type === 'App\Notifications\NewReplyAdded')
                        <!-- dd request -->
                        A new reply was added
                        <strong> {{$notification->data['discussion']['title']}}</strong>
                        <a href="{{route('discussions.show',$notification->data['discussion']['slug']) }}" class="btn btn-sm btn-info float-right text-light">View Discussion</a>
                        @endif
                        
                        @if ($notification->type === 'App\Notifications\ReplyMarkAsBestReply')
                        You Reply to the Discussion <strong>{{ $notification ->data['discussion']['title']}}</strong> as best reply
                        <a href="{{route('discussions.show',$notification->data['discussion']['slug']) }}" class="btn btn-sm btn-info float-right text-light">View Discussion</a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection