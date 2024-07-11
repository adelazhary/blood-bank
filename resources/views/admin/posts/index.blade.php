@extends('layouts.app')

@section('content')
    <div class="container-fluid py-8 px-4 md:px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Posts</li>
            </ol>
        </nav>

        {{-- @include('components.alert') --}}

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Posts</h1>
            @can('create', App\Models\Post::class)
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Create</a>
            @endcan
        </div>

        <form action="{{ route('posts.index') }}" method="GET" class="mb-4 d-flex flex-column flex-md-row">
            <input type="text" name="title" class="form-control mb-2 mb-md-0 me-md-2" placeholder="Search by title"
                value="{{ request('title') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                                    <td>{{ Str::limit($post->content, 50) }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td class="d-flex">
                                        @can('update', $post)

                                            <a href="{{ route('posts.edit', $post) }}"
                                                class="btn btn-warning btn-sm me-2">Edit</a>
                                        @endcan
                                        @can('delete', $post)
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No posts found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
    =
@endsection
