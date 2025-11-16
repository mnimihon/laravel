@extends('layouts.app')

@section('title', $title)

@section('body')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Профиль пользователя</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Имя:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $user['name'] }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Email:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $user['email'] }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Дата регистрации:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ \Carbon\Carbon::parse($user['joined'])->format('d.m.Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-primary">Редактировать профиль</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
