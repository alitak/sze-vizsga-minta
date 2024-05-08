@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="d-flex">
                    <span>Módosítás</span>
                </h1>

                <form method="post" action="{{ route('posts.update', $post) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Cím</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="intro" class="form-label">Bevezető</label>
                        <textarea class="form-control" id="intro" name="intro" rows="3">{{ $post->intro }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Tartalom</label>
                        <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Mod</button>
                </form>
            </div>
        </div>
    </div>
@endsection
