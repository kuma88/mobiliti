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
    <h1>Outstanding Trips</h1>
    <hr>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class= "flex card card-body bg-info">
            <!--<h4><a href="/posts/{{$post->id}}">{{$post->id}}</a><h4>-->
                <h4>From:{{$post->pickup}}<h4>
                <h4>To:{{$post->dropoff}}<h4>
                <small>Trip date:{{$post->date}} Time:{{$post->time}}</small>
                <a href="/posts/{{$post->id}}" class="btn btn-primary">View Details</a>    
            </div>
        @endforeach
    {{$posts->links()}}
    @else
        <p>There are no trips available</p>
    @endif

</div>

</body>
</html>