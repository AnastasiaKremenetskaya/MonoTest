@extends('main')

@section('content')
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">Пользователи</span>
        </h1>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route("users.create") }}" class="btn btn-primary btn-lg btn-warning">Добавить пользователя</a>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="demo-dynamic-tables-1" class="table table-middle nowrap">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>ФИО</th>
                                <th>Пол</th>
                                <th>Телефон</th>
                                <th>Адрес</th>
                                <th>Автомобил(ь/и)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{ $loop->iteration + ($users->currentpage() - 1) * $users->perpage() }}
                                    </td>
                                    <td>
                                        <strong>{{ $user['full_name'] }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $user['gender'] }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $user["phone"] }} </strong>
                                    </td>
                                    <td>
                                        <strong>{{ $user["address"] }} </strong>
                                    </td>
                                    <td>
                                        <ol>
                                            @foreach($user->cars as $car)
                                                <li>{{ $car['make'] }}</li>
                                            @endforeach
                                        </ol>
                                        <a href="{{ route("cars.create", ["id" => $user["id"]] ) }}" class="btn btn-info">Добавить авто</a>
                                    </td>
                                    <td>
                                        <div class="btn-group pull-right dropdown">
                                            <button class="btn btn-link link-muted" aria-haspopup="true"
                                                    data-toggle="dropdown" type="button">
                                                <span class="icon icon-ellipsis-h icon-lg icon-fw"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="{{ route("users.edit", ["id" => $user["id"]]) }}">Изменить</a>
                                                </li>
                                                <li>
                                                    <a href="" class="delete_btn">
                                                        Удалить
                                                        <form class="hidden_form" method="post"
                                                              action="{{ route("users.destroy", ["id" => $user["id"]]) }}">
                                                            @csrf
                                                            @method("DELETE")
                                                        </form>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="dataTables_paginate paging_simple_numbers" id="demo-dynamic-tables-2_paginate">
                                {{ $users->render() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
