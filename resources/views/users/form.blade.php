@extends('main')

@section('content')

    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">
                @if($update ?? false)
                    Изменить пользователя
                            </span>
        </h1>
    </div>

    <user-form-edit
        :user="{{ json_encode($user) }}"
        :route="{{  json_encode($route) }}"
    ></user-form-edit>

    @else
        Добавить пользователя
        </span>
        </h1>
        </div>

        <user-form-create
            :route="{{  json_encode($route) }}"
        ></user-form-create>
    @endif
@endsection
