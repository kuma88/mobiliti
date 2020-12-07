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
    <h1>Request a Trip</h1>

        <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="post">
            <!--<div class="form-group">
                <label for="pickup">Pick up From</label>
                <input type="text" class="form-control" id="pickup" placeholder="Enter Pick Up location">
            </div>
    
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" class="form-control" id="dropoff" placeholder="Enter your destination">
            </div>
    
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date"  placeholder="Select date">
            </div>
    
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time"  placeholder="Select time">
            </div>
    
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name"  placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">Your trip details will be emailed to you.</small>
            </div>
    
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" class="form-control" id="contact" aria-describedby="emailHelp" placeholder="Enter Handphone number">
                <small id="emailHelp" class="form-text text-muted"> This will allow driver to contact you.</small>
            </div>
    
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="roundtrip" value="Round Trip">
                <label class="form-check-label" for="roundtrip">Please check if round trip</label>
            </div>-->
            
            @csrf
            <div class="form-group">
                {{Form::label('pickup', 'Pick up From')}}
                {{Form::text('pickup', '', ['class' => 'form-control', 'placeholder' => 'Enter Pick Up location'])}}
            </div>

            <div class="form-group">
                {{Form::label('dropoff', 'Destination')}}
                {{Form::text('dropoff', '', ['class' => 'form-control', 'placeholder' => 'Enter your destination'])}}
            </div>

            <div class="form-group">
                {{Form::label('date', 'Trip Date')}}
                {{Form::date('date', '', ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('time', 'Time')}}
                {{Form::time('time', '', ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter your name'])}}
            </div>

            <div class="form-group">
                {{Form::label('email', 'Email address')}}
                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter email'])}}
                <small class="form-text text-muted">Your trip details will be emailed to you.</small>
            </div>

            <div class="form-group">
                {{Form::label('contact', 'Contact Number')}}
                {{Form::text('contact', '', ['class' => 'form-control', 'placeholder' => 'Enter Mobile number'])}}
                <small class="form-text text-muted">This will allow driver to contact you.</small>
            </div>

            <div class="form-check">
                {{Form::checkbox('roundtrip','Round-Trip', true)}}
                {{Form::label('roundtrip', 'Please check if round-trip')}}
            </div>

        
        {{Form::Submit('Submit Request', ['class'=>'btn btn-primary '])}}
            
        </form>
        
</div>


</body>
</html>