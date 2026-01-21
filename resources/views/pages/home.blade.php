@extends('layouts.app')

@section('title', $title)

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron bg-light p-5 rounded">
                    <h1 class="display-4">{{ $title }}</h1>
                    <p class="lead">{{ $description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
