@extends('layouts.main')

@section('title', 'Feed List')

@section('content')

{{-- {{ dd($feed) }} --}}

<h1> Feed Listing Edit </h1>

<div class="container">

    <form action="{{ route('feed.update', ['feed' => $feed->id]) }}" method="POST">
    @csrf 
    @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Feed Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $feed->title) }}" required >
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name ="description" id="description" cols="30" rows="10" >{{ old('description', $feed->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Feed</button>
    </form>
</div>    
    
@endsection