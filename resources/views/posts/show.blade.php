@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="d-flex">
                    <span>{{ $post->title }}</span>
                </h1>

                <p>
                    {{ $post->content }}
                </p>

                <h3>Hozzászólások</h3>

                @auth
                    <form action="{{ route('comments.store', $post->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <textarea name="content" class="form-control" placeholder="Írj egy hozzászólást"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Küldés</button>
                    </form>
                @endauth

                @foreach ($comments as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                            <p>{{ $comment->content }}</p>
                            <span>{{ $comment->id }}</span>
                        </div>
                    </div>
                @endforeach

                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
