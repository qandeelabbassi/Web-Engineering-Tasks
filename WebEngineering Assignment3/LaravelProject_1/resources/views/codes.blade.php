@extends('app')

@section('content')
<div class="container">

    <div class="row">
        <h2>Click on Name to view code</h2>
        @foreach ($codes as $c)
            <a href="/codes/{{$c->user_id}}">Code by: {{$c->user->name}}</a><br>
        @endforeach
    </div>

</div>
@endsection
