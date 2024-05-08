@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="d-flex">
                    <span>Bejegyzések</span>
                    @auth
                        <a href="{{ route('posts.create') }}" class="btn btn-primary ml-auto">
                            Új bejegyzés
                        </a>
                    @endauth
                </h1>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                            @auth
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">MOD</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="DEL">
                                </form>
                            @endauth
                        </div>
                        <div class="card-body">
                            {{ $post->content }}
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span>{{ $post->user->name }}</span>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
