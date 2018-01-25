@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        <h1>Subscribe to our Newsletter</h1>
        <div>
            <form method="get" action="{{route('subscribe.store')}}">
                <input type="hidden" name="_token" value='{{ csrf_token() }}' />
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="post" placeholder="Enter Your Email" />
                </div>
                <div>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection