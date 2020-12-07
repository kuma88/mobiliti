<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mobiliti') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ URL::to('/') }}">Mobiliti</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::to('posts') }}">View All Trips</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::to('posts/create') }}">Request Trip</a>
            </li>
        </ul>
        </div>
    </nav>
</div>

<div class="container">
    @include('inc.messages')
    <a href="/posts" class= "btn btn-primary">Return</a>
    <h1>Trip Number:{{$post->id}}</h1>
    <hr>
    <!--"this converts to !!convert to html text!!"-->
    <h5> From :{!!$post->pickup!!}</h5>
    <h5> Destination :{!!$post->dropoff!!}</h5>
    <h5> Trip Date :{!!$post->date!!}</h5>
    <h5> Time :{!!$post->time!!}</h5>
    <h5> Type :{!!$post->roundtrip!!}</h5>             
    <hr>
    <small>Requested on {{$post->created_at}} by {{$post->name}}</small>
    <hr>


    <a href="/posts/{{$post->id}}/edit" class= "btn btn-warning" style = "float">Edit trip details</a>

    <form action="/posts/{{ $post->id }}" method="POST" class = 'pull-right'>
        @csrf
        @method('DELETE')
        <br>
        {{Form::Submit('Delete this Trip', ['class' => 'btn btn-danger'])}}
    </form>


</body>
</html>