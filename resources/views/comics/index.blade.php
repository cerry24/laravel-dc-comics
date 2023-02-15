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
                    <th scope="col"><a class="btn btn-success" href="{{ route('comics.create') }}">add new comic</a></th>
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
                        <a class="btn btn-warning" href="{{ route('comics.edit', $comic->id) }}">edit</a>
                        <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="d-inline-block deleter" data-element-name="{{ $comic->title }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <p>There are no comics to be shown</p>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/deleteConfermation.js')
@endsection