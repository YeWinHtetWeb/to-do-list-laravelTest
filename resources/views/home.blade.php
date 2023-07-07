@extends('master')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-5">
                <div class="p-3">
                    <form action="{{ route('post#create') }}" method="POST">
                        @csrf
                        <h1 class="fw-bold mb-5 text-center">Post Blog</h1>

                        @if (session('createSuccess'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('createSuccess') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('updateSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('updateSuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                        <div class="text-group mb-4">
                            <label for="title" class="fw-bold fs-5 mb-2">Title</label>
                            <input type="text" name="postTitle" id="title" class="form-control @error('postTitle') is-invalid @enderror" value="{{ old('postTitle') }}" placeholder="Enter Post Title...">
                            @error('postTitle')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-group mb-4">
                            <label for="description" class="fw-bold fs-5 mb-2">Descriptions</label>
                            <textarea name="postDescription" id="description" cols="30" rows="10" class="form-control @error('postDescription') is-invalid @enderror" placeholder="Enter Post Description...">{{ old('postDescription') }}</textarea>
                            @error('postDescription')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-group mb-4">
                            <label for="image" class="fw-bold fs-5 mb-2">Image</label>
                            <input type="file" name="postImage" id="image" class="form-control @error('postTitle') is-invalid @enderror" value="{{ old('postImage') }}" placeholder="Enter Post Image...">
                            @error('postImage')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-group mb-4">
                            <label for="price" class="fw-bold fs-5 mb-2">Price</label>
                            <input type="text" name="postPrice" id="price" class="form-control @error('postPrice') is-invalid @enderror" value="{{ old('postPrice') }}" placeholder="Enter Post Price...">
                            @error('postPrice')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-group mb-4">
                            <label for="address" class="fw-bold fs-5 mb-2">Address</label>
                            <input type="text" name="postAddress" id="address" class="form-control @error('postAddress') is-invalid @enderror" value="{{ old('postAddress') }}" placeholder="Enter Post Address...">
                            @error('postAddress')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-group mb-4">
                            <label for="rating" class="form-label fw-bold fs-5 mb-2">Rating</label>
                            <input type="range" name="postRating" id="rating" class="form-range" min="0" max="5" @error('postRating') is-invalid @enderror" value="{{ old('postRating') }}">
                            @error('postRating')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                     <div class="mt-4">
                            <input type="submit" value="Create Post" class="fw-bold fs-5 btn btn-outline-danger">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-7 p-3">
                <h1 class="fw-bold mb-5 text-center">Post List</h1>
                @if (session('deleteSuccess'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('deleteSuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @foreach ($posts as $item)
                    <div class="content shadow p-3 mb-3">
                        <div class="row">
                            <h3 class="col-9 fw-bold mb-4">{{ $item['title'] }}</h3>
                            <h5 class="col-3 text-muted">{{ $item->created_at->format('j-F-Y') }}</h5>
                        </div>
                        <p class="text-muted">{{ Str::words($item['description'], 50, '.....') }}</p>
                        <div class="d-flex justify-content-between mt-5">
                            <div class="moreData fw-bold">
                                <i class="fa-solid fa-money-bill-1-wave text-success"></i> {{ $item->price }} |
                                <i class="fa-solid fa-location-dot text-danger"></i> {{ $item->address }} |
                                <i class="fa-solid fa-star text-warning"></i> {{ $item->rating }}
                            </div>
                            <div class="btn-section">
                                <a href="{{ route('post#delete', $item['id']) }}" class="text-decoration-none">
                                    <button class="btn btn-danger p-2 me-2"><i class="fa-solid fa-trash-can"></i> Delete</button>
                                </a>
                                <a href="{{ route('post#seeMore', $item['id']) }}" class="text-decoration-none">
                                    <button class="btn btn-primary p-2"><i class="fa-solid fa-circle-info"></i> See More</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
