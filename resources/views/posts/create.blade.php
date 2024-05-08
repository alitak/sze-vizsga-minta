@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="d-flex">
                    <span>Új bejegyzés</span>
                </h1>

                <form method="post" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Cím</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="intro" class="form-label">Bevezető</label>
                        <textarea class="form-control" id="intro" name="intro" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Tartalom</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
