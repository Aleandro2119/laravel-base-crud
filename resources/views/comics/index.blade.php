@extends('layouts.main')
@section('content')
@if (session('message'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('message') }}
        </div>
    @endif
<div class="d-flex justify-content-center p-3">
    <a class="btn btn-success" href="{{ route('comics.create') }}">Aggiungi Comics</a>
</div>
    <div class="row">
        @forelse ($comics as $comic)
            <div class="col-3">
                <div class="card mb-3 overflow-auto">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $comic->thumb }}" class="img-fluid rounded-start" alt="{{ $comic->series }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="interact d-flex justify-content-end">
                                    <a href="{{ route('comics.edit', $comic) }}" class="btn btn-sm btn-warning me-1">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('comics.destroy', $comic->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                                <h5 class="card-title">{{ $comic->title }}</h5>
                                <p class="card-text">Series: <strong>{{ $comic->series }}</strong></p>
                                <p class="card-text text-muted">€{{ $comic->price }}</p>
                            </div>
                            <div class="card-footer bg-white">
                                <p class="card-text">{{ date('F j, Y', strtotime($comic->sale_date)) }}</p>
                                <a href="{{ route('comics.show', $comic) }}">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <h1 class="text-center mt-5">Non ci sono Comics</h1>
        @endforelse
    </div>
@endsection