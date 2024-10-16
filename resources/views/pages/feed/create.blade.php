@extends('layouts.main')

@section('title', 'Feed List')

@section('content')

{{-- {{ dd($feed) }} --}}

<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1> New Feed </h1>

    <form action="{{ route('feed.store') }}" method="POST">
    @csrf 

        <div class="mb-3">
            <label for="title" class="form-label">Feed Title</label>
            <input type="text" name="title" id="title" class="form-control" maxlength="100" minlength="3" >
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name ="description" id="description" cols="30" rows="10" maxlength="100" minlength="3" > </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>    
    
@endsection