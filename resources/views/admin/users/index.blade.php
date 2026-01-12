@extends('layouts.guest')

@section('body')
    <div class="container mt-3">
        <h3 class="fw-bold fs-2 text-dark mb-2">Пользователи</h3>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @include('components.pagination', ['paginator' => $users])
    </div>
@endsection
