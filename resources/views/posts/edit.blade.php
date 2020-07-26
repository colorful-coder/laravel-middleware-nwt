@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Update a post</div>
        <div class="panel-body py-3 pl-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('posts.update', $post->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value={{ $post->title }} />
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <input type="text" class="form-control" name="content" value={{ $post->content }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
