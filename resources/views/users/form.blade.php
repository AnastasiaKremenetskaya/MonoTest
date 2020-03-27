@extends('main')

@section('content')
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">
                @if($update ?? false)
                    Изменить пользователя
                @else
                    Добавить пользователя
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

                    <label class="col-sm-4" for="form-control-1">ФИО (мин 3 символа)</label>
                    <div class="col-sm-12">
                        <input id="full_name" class="form-control" name="full_name"
                               value="{{ $user["full_name"] ?? '' }}"
                               type="text">
                    </div>

                    <label class="col-sm-1 control-label" for="form-control-1">Пол</label>
                    <div class="col-sm-12">
                        <select class="custom-select" name="gender">
                            <option value="male">Мужской</option>
                            <option value="female">Женский</option>
                            <option value="other">Прочее</option>
                        </select>
                    </div>

                    <label class="col-sm-4" for="form-control-1">Номер телефона</label>
                    <div class="col-sm-12">
                        <input id="phone" class="form-control" name="phone" value="{{ $user["phone"] ?? '' }}"
                               type="tel">
                    </div>

                    <label class="col-sm-1 control-label" for="form-control-1">Адрес</label>
                    <div class="col-sm-12">
                        <input id="address" class="form-control" name="address" value="{{ $user["address"] ?? '' }}"
                               type="text">
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

            </form>
        </div>
    </div>
    </div>
@endsection
