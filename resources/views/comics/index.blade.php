@extends('layouts.app')

@section('title', 'comics')

@section('main-content')
    <div class="container mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">price</th>
                    <th scope="col">series</th>
                    <th scope="col">type</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comics as $comic)
                <tr>
                    <th scope="row">{{ $comic->id }}</th>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->price }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ $comic->type }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('comics.show', $comic->id) }}">show</a>
                    </td>
                </tr>
                @empty
                    <p>There are no comics to be shown</p>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection