@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Technologies</h1>
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary mb-3">Add New Technology</a>
        <ul>
            @foreach($technologies as $technology)
                <li>{{ $technology->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection