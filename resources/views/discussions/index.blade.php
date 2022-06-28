@extends('layouts.app')

@section('content')



<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mb-4">
            @foreach($discussions as $discussion)
            @include ('partials.discussion-header')

            <div class="card-body">
                <strong class="text-center d-block"> {{ $discussion->title }} </strong>
            </div>
            @endforeach
            <!-- discion links show paginate 
        but append channel and amke it equal to request query chanel -->
            {{$discussions->appends(['channel'=>request()->query('channel')])->links()}}
        </div>
    </div>
</div>
@endsection