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
<div class = container>
    @include('inc.messages')
<h1>Editing Trip {{$post->id}}</h1>

    {!! Form::model($post, [
        'route' => ['posts.update', $post->id],
        'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
    
            @csrf
            <div class="form-group">
                {{Form::label('pickup', 'Pick up From')}}
                {{Form::text('pickup', $post->pickup, ['class' => 'form-control', 'placeholder' => 'Enter Pick Up location'])}}
            </div>

            <div class="form-group">
                {{Form::label('dropoff', 'Destination')}}
                {{Form::text('dropoff', $post->dropoff, ['class' => 'form-control', 'placeholder' => 'Enter your destination'])}}
            </div>

            <div class="form-group">
                {{Form::label('date', 'Trip Date')}}
                {{Form::date('date', $post->date, ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('time', 'Time')}}
                {{Form::time('time', $post->time, ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $post->name, ['class' => 'form-control', 'placeholder' => 'Enter your name'])}}
            </div>

            <div class="form-group">
                {{Form::label('email', 'Email address')}}
                {{Form::email('email', $post->email, ['class' => 'form-control', 'placeholder' => 'Enter email'])}}
                <small class="form-text text-muted">Your trip details will be emailed to you.</small>
            </div>

            <div class="form-group">
                {{Form::label('contact', 'Contact Number')}}
                {{Form::text('contact', $post->contact, ['class' => 'form-control', 'placeholder' => 'Enter Mobile number'])}}
                <small class="form-text text-muted">This will allow driver to contact you.</small>
            </div>

            <div class="form-check">
                {{Form::checkbox('roundtrip','Round-Trip', true)}}
                {{Form::label('roundtrip', 'Please check if round-trip')}}
            </div>

        
        {{Form::Submit('Update', ['class'=>'btn btn-primary '])}}
            
    {!! Form::close() !!}
        
</div>


</body>
</html>