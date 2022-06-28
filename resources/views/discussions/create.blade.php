@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add Discussion</div>
            <div class="card-body">
                <form action="{{route('discussions.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="">
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <form …>
                            <input id="content" type="hidden" name="content">
                            <trix-editor input="content"></trix-editor>
                    </div>

                    <div class="form-group">
                        <label for="channel">Channel</label>
                        <select name="channel" id="channel" class="form-control">

                            @foreach($channels as $channel)
                            <option value="{{$channel->id}}"> {{$channel->name}} </option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Create Discussion</button>
                </form>
            </div>
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