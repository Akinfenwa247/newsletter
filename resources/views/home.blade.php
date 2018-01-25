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
        <h1>Enter the details for the email you wish to send</h1>
        <div>
            <form method="get" action="{{route('send')}}">
                <input type="hidden" name="_token" value='{{ csrf_token() }}' />
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="name" placeholder="Message Title " />
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" name="post" placeholder="Enter message here"></textarea>
                </div>
                <div>
                    <button class="btn btn-primary">Send Mail</button>
                </div>
            </form>
        </div>
    </div>
@endsection