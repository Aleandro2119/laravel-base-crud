@extends('layouts.main')

@section('content')
    <div class="container">
        <form action="{{ route('comics.store') }}" method="post">
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Title</span>
                <input type="text" class="form-control" placeholder="Enter Title" name="title" required>
                <span class="input-group-text" id="basic-addon1">Series</span>
                <input type="text" class="form-control" placeholder="Enter Series" name="series" required>
            </div>

            <div class="input-group mb-3">
                <input type="date" class="form-control" placeholder="Sale Date" name="sale_date" required>
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text">https://example.com/image/</span>
                <input type="text" class="form-control" placeholder="Comic image URL" name="thumb" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">€</span>
                <input type="number" class="form-control" default="0" min="0" placeholder="Price" name="price" required>
                <span class="input-group-text">.00</span>
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Type" name="type" required>
            </div>

            <div class="input-group">
                <span class="input-group-text">Decription</span>
                <textarea class="form-control" name="description" required></textarea>
            </div>

            <button class="btn btn-danger mt-3" type="reset">Reset</button>
            <button class="btn btn-success mt-3" type="submit">Aggiungi</button>
        </form>
    </div>
@endsection