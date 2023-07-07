@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-5 shadow">
                <div class="p-3">
                    <h1 class="fw-bold mb-5 text-center">Post Detail</h1>
                    <h3 class="fw-bold mb-4">{{ $post['title'] }}</h3>
                    <p class="text-muted">{{ $post['description'] }}</p>
                    <div class="text-end mt-5">
                        <a href="{{ route('post#createPage') }}" class="text-decoration-none">
                            <button class="btn btn-dark p-2 me-2"><i class="fa-solid fa-left-long"></i> Back</button>
                        </a>
                        <a href="{{ route('post#editPage', $post['id']) }}" class="text-decoration-none">
                            <button class="btn btn-outline-primary p-2"><i class="fa-solid fa-file-pen"></i> Edit</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
