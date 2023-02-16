@extends('layouts.app')

@section('title', "editing $comic->title")

@section('main-content')
    <div class="container mt-5">
        <div class="col-10">
            @include('admin.comics.partials.form', [
                'route' => 'admin.comics.update',
                'method' => 'PUT',
                'comic' => $comic
            ])
        </div>
    </div>
@endsection