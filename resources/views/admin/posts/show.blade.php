@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>
        @if($project->type)
            <p><strong>Type:</strong> {{ $project->type->name }}</p>
        @endif
        @if($project->technologies->isNotEmpty())
            <p><strong>Technologies:</strong>
                @foreach($project->technologies as $technology)
                    <span class="badge bg-info text-dark">{{ $technology->name }}</span>
                @endforeach
            </p>
        @endif
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to Projects</a>
    </div>
@endsection
