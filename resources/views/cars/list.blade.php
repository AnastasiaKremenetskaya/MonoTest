@extends('main')

@section('content')
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">Автомобили</span>
        </h1>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route("cars.create") }}" class="btn btn-primary btn-lg btn-warning">Добавить автомобиль</a>
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
                                <th>Марка</th>
                                <th>Модель</th>
                                <th>Цвет кузова</th>
                                <th>Гос Номер РФ</th>
                                <th>Присутствует на стоянке?</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>
                                        {{ $loop->iteration + ($cars->currentpage() - 1) * $cars->perpage() }}
                                    </td>
                                    <td>
                                        <strong>{{ $car['make'] }}</strong>
                                    </td>
                                    <td>
                                        <p>{{ $car['model'] }}</p>
                                    </td>
                                    <td>
                                        <strong>{{ $car["colour"] }} </strong>
                                    </td>
                                    <td>
                                        <strong>{{ $car["license_plate_number"] }} </strong>
                                    </td>
                                    @if ($car['is_on_parking'] == 1)
                                        <td>
                                            <strong>Да</strong>
                                        </td>
                                    @else
                                        <td>
                                            <strong>Нет</strong>
                                        </td>
                                    @endif

                                    <td>
                                        <div class="btn-group pull-right dropdown">
                                            <button class="btn btn-link link-muted" aria-haspopup="true"
                                                    data-toggle="dropdown" type="button">
                                                <span class="icon icon-ellipsis-h icon-lg icon-fw"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="{{ route("cars.edit", ["id" => $car["id"]]) }}">Изменить</a>
                                                </li>
                                                <li>
                                                    <a href="" class="delete_btn">
                                                        Удалить
                                                        <form class="hidden_form" method="post"
                                                              action="{{ route("cars.destroy", ["id" => $car["id"]]) }}">
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
                                {{ $cars->render() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
