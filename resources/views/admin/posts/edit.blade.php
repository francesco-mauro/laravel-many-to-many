@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $post->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-control" id="type_id" name="type_id">
                    <option value="">Select Type</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ $post->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
