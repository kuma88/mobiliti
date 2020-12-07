@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h3>Driver Name: {{ $user->name }}</h3>
                <div class="pt-3">Hello! This is my profile.</div>
            </div>
        </div>
    </div>
 </div>

    
@endsection