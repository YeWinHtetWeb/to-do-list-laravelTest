@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-5 shadow">
                <div class="p-3">
                    <h1 class="fw-bold mb-5 text-center">Post Edit</h1>

                    <form action="{{ route('post#update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="postId" value="{{ $post['id'] }}">
                        <div class="text-group mb-4">
                            <label for="title" class="fw-bold fs-5 mb-2">Title</label>
                            <input type="text" name="postTitle" id="title" class="form-control @error('postTitle') is-invalid @enderror" placeholder="Enter Post Title..." value="{{ old('postTitle', $post['title']) }}">
                            @error('postTitle')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-group mb-4">
                            <label for="description" class="fw-bold fs-5 mb-2">Descriptions</label>
                            <textarea name="postDescription" id="description" cols="30" rows="10" class="form-control @error('postDescription') is-invalid @enderror" placeholder="Enter Post Description...">{{ old('postDescription', $post['description']) }}</textarea>
                            @error('postDescription')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-end mt-5">
                            <a href="{{ route('post#seeMore', $post['id']) }}" class="text-decoration-none">
                                <button type="button" class="btn btn-dark p-2 me-2"><i class="fa-solid fa-left-long"></i> Back</button>
                            </a>
                            <input type="submit" value="Update Post" class="fw-bold fs-5 btn btn-outline-danger">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
