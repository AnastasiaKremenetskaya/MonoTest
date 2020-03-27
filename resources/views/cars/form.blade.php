@extends('main')

@section('content')

<div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">
                @if($update ?? false)
                    Изменить автомобиль
                @else
                    Добавить автомобиль
                @endif
            </span>
        </h1>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="demo-form-wrapper">
                @if (session('errors'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('errors')->first() }}
                    </div>
                @endif

                <form class="form form-horizontal" action="{{ $route }}" method="post">
                    @csrf
                    @if($update ?? false)
                        @method('PUT')
                    @endif

                    <label class="col-sm-1 control-label" for="form-control-1">Клиент</label>
                    <div class="col-sm-12">
                        <select class="custom-select" name="user_id" id="user_id">
                            @if($user ?? false)
                                <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                            @else
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label class="col-sm-1 control-label" for="form-control-1">Марка</label>
                    <div class="col-sm-12">
                        <input id="make" class="form-control" name="make" value="{{ $car["make"] ?? '' }}"
                               type="text">
                    </div>

                    <label class="col-sm-1 control-label" for="form-control-1">Модель</label>
                    <div class="col-sm-12">
                        <input id="model" class="form-control" name="model" value="{{ $car["model"] ?? '' }}"
                               type="text">
                    </div>

                    <label class="col-sm-4" for="form-control-1">Цвет кузова</label>
                    <div class="col-sm-12">
                        <input id="colour" class="form-control" name="colour" value="{{ $car["colour"] ?? '' }}"
                               type="text">
                    </div>

                    <label class="col-sm-4" for="form-control-1">Гос Номер РФ</label>
                    <div class="col-sm-12">
                        <input id="license_plate_number" class="form-control" name="license_plate_number"
                               value="{{ $car["license_plate_number"] ?? '' }}"
                               type="number">
                    </div>

                    <label class="col-sm-4">Присутствует на стоянке?</label>
                    <div class="col-xs-4 col-sm-3">
                        <div class="input-group form_element">
                            <div class="slideTwo">
                                <input type="checkbox" value="false" class="form-control" id="is_on_parking"
                                       name="is_on_parking"
                                        @if($car["is_on_parking"] ?? false)
                                            checked="checked"
                                        @endif>
                                <label for="is_on_parking"></label>
                            </div>
                        </div>
                    </div>

                    <label class="col-sm-3 control-label" for="form-control-1"></label>
                    <div class="col-sm-9 submitBtn" align="right">
                        <label class="btn btn-success file-upload-btn">
                            @if($update ?? false)
                                Изменить
                            @else
                                Добавить
                            @endif
                            <input class="file-upload-input" type="submit" multiple="">
                        </label>
                    </div>

            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
