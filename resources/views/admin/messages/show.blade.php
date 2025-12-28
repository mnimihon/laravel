@extends('layouts.admin')

@section('body')
    <div class="container mt-2">
        <h3>Редактировать сообщение</h3>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">
                    Ошибки валидации
                </h5>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.messages.update', $message->id) }}">
            @csrf

            <div class="mt-3 mb-3">
                <textarea
                    name="message"
                    id="message"
                    class="form-control"
                    rows="8"
                >{{ old('message', $message->message) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Сохранить
                </button>
                <a href="{{ route('admin.messages.index') }}"
                   class="btn btn-secondary">
                    Назад
                </a>
            </div>
        </form>
    </div>
@endsection
