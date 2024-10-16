@extends('layouts.main')

@section('title', 'Feed List')

@section('content')

{{-- {{ dd($feeds) }} --}}

<div class="container">

    @if (session('success'))
        <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
    @endif

    <h1> Feed List </h1>

    <a type="button" class="btn btn-primary mb-3" href="{{ route('feed.create') }}">New Feed</a>

        @foreach ($feeds as $feed )
            <div class="card mb-3" style="width: 50%;">
                <div class="card-body">
                <p class="card-title">{{ $feed->title }}</p>
                <p class="card-text" style="color:blueviolet">{{ $feed->description }}</p>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-start">
            {{ $feeds->links() }}
        </div>
</div>    
    
@endsection