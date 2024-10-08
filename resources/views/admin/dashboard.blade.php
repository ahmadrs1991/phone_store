@extends('welcome')

@section('title', 'Dashborad')
@section('content')

        <div class="container1">

    </div>

<table class="table table-success table-striped">
    <div class="container">
        <a href="{{ route('users.index')}}"><h2>User list fef</h2></a>

        @if($users->isEmpty())
            <p>No items found.</p>
        @endif
    </div>
@endsection
