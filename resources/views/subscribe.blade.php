<!DOCTYPE html>
<html>
<body>
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
<div>
    <h1>Subscribe</h1>
    <form method="post" action="{{route('subscribe.store')}}">
        {{csrf_field()}}

        <input type="email" name="email" placeholder="Email">
        <button>Send</button>
    </form>

</div>
</body>
</html>