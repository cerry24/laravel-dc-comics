@extends('layouts.app')

@section('title', "comic $comic->series")

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="comic">
                    <img src="{{ $comic->cover }}" alt="{{ $comic->title }} cover">
                    <h2>{{ $comic->title }}</h2>
                    <div class="info">
                        <p>{{ $comic->description }}</p>
                        <p>Price: {{ $comic->price }}&euro;</p>
                        <p>Series: {{ $comic->series }}</p>
                        <p>Sale date: {{ $comic->sale_date }}</p>
                        <p>Type: {{ $comic->type }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection