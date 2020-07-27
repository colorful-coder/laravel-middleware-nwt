@extends('layouts.app') @section('content')
<div class="container">
    <div class="col-sm-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header h3">
            Posts
            <a href="{{ route('posts.create') }}" 
                class="btn btn-outline-primary float-right">New Post
            </a>
        </div>
        <div class="panel-body py-3 pl-4">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Content</td>
                            <td colspan="2" class="text-center">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td class="text-right">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="btn btn-outline-primary">Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
