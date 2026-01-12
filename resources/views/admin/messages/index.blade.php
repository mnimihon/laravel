@extends('layouts.guest')

@section('body')
    <div class="container mt-3">
        <h3 class="fw-bold fs-2 text-dark mb-2">Сообщения</h3>

        @if(session('deleted'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('deleted') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Сообщение</th>
                    <th>Операции</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{$message->id}}</td>
                        <td>{{$message->message}}</td>
                        <td>
                            <a class="btn btn-primary mt-2" href="{{ route('admin.messages.show', $message->id) }}">
                                Редактировать
                            </a>

                            @if(auth()->user()->can('delete_messages'))
                                <form method="POST" action="{{ route('admin.messages.delete', $message->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger mt-2">
                                        Удалить
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('components.pagination', ['paginator' => $messages])
    </div>
@endsection
