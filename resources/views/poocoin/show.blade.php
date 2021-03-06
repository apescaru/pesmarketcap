@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ $coin->name }}</div>

                @foreach($reddits as $r)
                <div class="card-body">
                    <h4> {{ $r->title }} </h4>
                    <p> {!! $r->description_html !!} </p>
                </div>
                @endforeach
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
