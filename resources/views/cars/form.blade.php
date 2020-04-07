@extends('main')

@section('content')

    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">
                @if($update ?? false)
                    Изменить автомобиль
                            </span>
        </h1>
    </div>

    <car-form-edit
        :users="{{ json_encode($users) }}"
        :car="{{ $car->toJson() }}"
        :route="{{  json_encode($route) }}"
    ></car-form-edit>

    @else
        Добавить автомобиль
        </span>
        </h1>
        </div>

        <car-form-create
            @if($users ?? false)
            :users="{{ json_encode($users) }}"
            @else
            :user="{{ $user->toJson() }}"
            @endif
            :route="{{  json_encode($route) }}"
        ></car-form-create>
    @endif
@endsection
