@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                @foreach($poocoins as $p)
                    <div style="display: flex; align-content: center;"> <a style="width:30%;font-size: 1.575rem;padding: 0;" href="{{route("poocoin.show", ["id" => $p->id])}}"> {{$p->name}} </a> <span style="padding-left: 25px;"> News gathered: {!! $p->reddits()->count() !!} </span> </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success">
                    % Change UP
                </div>

                <div class="card-body">
                    test
                </div>
            </div>
            <div class="card mt-3 mb-3">
                <div class="card-header bg-danger">
                    % Change DOWN
                </div>
                <div class="card-body">
                    test
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
