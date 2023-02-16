@extends('layouts.app')

@section('title', 'create new comic')

@section('main-content')
    <div class="container mt-5">
        <div class="col-10">
            @include('admin.comics.partials.form', [
                'route' => 'admin.comics.store',
                'method' => 'POST',
                'comic' => $comic
            ])
        </div>
    </div>
@endsection