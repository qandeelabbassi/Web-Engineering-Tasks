@extends('app')

@section('content')
<div class="container">

    <div class="row">
        @if ($user->role == 'Moderator')
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/codes') }}">Others' Codes</a></li>
            </ul>
        @endif
    </div>
	<div class="row">
    <form 
    role="form" class="col-md-6"
    action="/home"
    method="post"
    target="result"
    >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2>Code</h2>
        <textarea 
        id="code" 
        style="font-family: consolas;"
         rows="20" class="col-md-12 form-control"
          placeholder="Write code"
          name="code"> @if ($user->code){{$user->code->code}}@endif</textarea>
        <br>
        <hr>
        <br>
        <button class="btn btn-default form-control">Run<span class="glyphicon glyphicon-play"><span></button>
    </form>

    <div class="col-md-6" name="result">
        <h2>Output</h2>
        <!-- display execution results here -->
        <iframe name="result" frameborder="0"></iframe>
    </div>
</div>
</div>
@endsection
