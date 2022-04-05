@extends('layouts.main')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="card mb-3 overflow-auto">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="{{ $comic->thumb }}" class="img-fluid rounded-start" alt="{{ $comic->series }}">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comic->title }}</h5>
                                <p class="card-text">Series: <strong>{{ $comic->series }}</strong></p>
                                <p class="card-text">{{ $comic->description }}</p>
                                <p class="card-text">Type: <strong>{{ ucfirst($comic->type) }}</strong></p>

                                <p class="card-text text-muted">€{{ $comic->price }}</p>
                            </div>
                            <div class="card-footer bg-white">
                                <p class="card-text"><span class="text-decoration-underline">Sale Date:</span>
                                    {{ date('F j, Y', strtotime($comic->sale_date)) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ route('comics.index') }}">Back</a>
            </div>
        </div>
    </div>
@endsection