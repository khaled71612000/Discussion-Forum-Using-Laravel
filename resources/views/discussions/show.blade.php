@extends('layouts.app')

@section('content')


<div class="card">
        @include('partials.discussion-header')
        <div class="card-body">
                <strong class="text-center d-block"> {{ $discussion->title }} </strong>
        </div>
        <div class="p-2">
                {!! $discussion->content !!}
                @if($discussion ->bestReply)
                <div class="card text-light bg-success my-5">
                        <div class="card-header">
                                <div class="d-flex justify-content-between">
                                <img width="40px" height="50px" style="border-radius: 50%;" src="{{Gravatar::get($discussion->bestReply->user->email)}}" alt="">
                                        <strong>
                                                {{$discussion->bestReply->user->name}}
                                        </strong>
                                </div>
                        </div>
                        <div class="card-body">
                                {!! $discussion->bestReply->content !!}

                        </div>
                </div>

                @endif

        </div>
        @foreach($discussion->replies()->paginate(3) as $reply)
        <div class="card my-5">
                <div class="card-header">
                        <div class="d-flex justify-content-between">
                                <div>
                                        <img width="40px" height="50px" style="border-radius: 50%;" src="{{Gravatar::get($reply->user->email)}}" alt="">
                                        <span>{{$reply->user->name}}</span>
                                </div>
                                <div>
                                        @auth
                                        @if(auth()->user()->id === $discussion->user_id)
                                        <form action=" {{route('discussions.best-reply',
                                         ['discussion' => $discussion->slug, 'reply' => $reply->id ]) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-info text-light" type="submit">Mark as Best Reply</button>
                                        </form>
                                        @endif
                                        @endauth
                                </div>
                        </div>
                </div>
                <div class="card-body">
                        {!! $reply->content !!}
                        <!-- reletionship as attribute if u put () its function builder isntance -->

                </div>
        </div>


        @endforeach

        {{ $discussion->replies()->paginate(3)->links() }}
        <div class="card my-5 ">

                <div class="card-header">

                        Add a reply
                </div>
                <div class="card-body">

                        @auth
                        <form action="{{route('replies.store',$discussion->slug)}}" method="POST">
                                @csrf
                                <input type="hidden" name="content" id="content">
                                <trix-editor input="content"></trix-editor>

                                <button class="btn btn-success btn-sm my-2">Add reply</button>
                        </form>
                        @else
                        <a href="{{route('login')}}" style="width: 100%;" class="text-light btn btn-info">Sign in To reply</a>
                        @endauth

                </div>
        </div>
</div>
@endsection

<!-- cdn trix -->
@section ('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
@endsection
@section ('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous"></script>
@endsection