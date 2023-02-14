@extends('layouts.app')

@section('title', 'create new comic')

@section('main-content')
    <div class="container mt-5">
        <div class="col-10">
            <form action="{{ route('comics.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="input-title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="input-title">
                </div>
                <div class="mb-3">
                    <label for="input-description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="input-description" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="input-cover" class="form-label">Cover</label>
                    <input type="text" class="form-control" name="cover" id="input-cover">
                </div>
                <div class="mb-3">
                    <label for="input-price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="input-price">
                </div>
                <div class="mb-3">
                    <label for="input-series" class="form-label">Series</label>
                    <input type="text" class="form-control" name="series" id="input-series">
                </div>
                <div class="mb-3">
                    <label for="input-sale_date" class="form-label">Sale date</label>
                    <input type="date" class="form-control" name="sale_date" id="input-sale_date">
                </div>
                <div class="mb-3">
                    <label for="input-type" class="form-label">Type</label>
                    <input type="text" class="form-control" name="type" id="input-type">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection