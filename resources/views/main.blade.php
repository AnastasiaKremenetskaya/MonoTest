<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parking System</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{ asset("css/vendor.css") }}">
    <link rel="stylesheet" href="{{ asset("css/elephant.css") }}">
    <link rel="stylesheet" href="{{ asset("css/application.css") }}">
    <link rel="stylesheet" href="{{ asset("css/custom.css") }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="layout layout-header-fixed">
<v-app id="app" class="d-flex justify-center">
    <div class="layout-header">
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand navbar-brand-center" href="{{ route('main') }}">
                    Админпанель
                </a>
                <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse"
                        data-target="#sidenav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
                    <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
                </button>
                <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse"
                        data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="arrow-up"></span>
                    <span class="ellipsis ellipsis-vertical">
              <img class="ellipsis-object" width="32" height="32" src="img/0180441436.jpg" alt="Teddy Wilson">
            </span>
                </button>
            </div>
            <div class="navbar-toggleable">
                <nav id="navbar" class="navbar-collapse collapse">
                    <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true"
                            type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
                    </button>
                </nav>
            </div>
        </div>
    </div>

    <div class="layout-main">
        <div class="layout-sidebar">
            <div class="layout-sidebar-backdrop"></div>
            <div class="layout-sidebar-body">
                <div class="custom-scrollbar">
                    <nav id="sidenav" class="sidenav-collapse collapse">
                        <ul class="sidenav">
                            @foreach ($menu as $item)
                                <li class="sidenav-item">
                                    <a href="{{ route($item["route"]) }}" aria-haspopup="true">
                                        <span class="sidenav-icon icon {{ $item["ico"] }}"></span>
                                        <span class="sidenav-label">{{ $item["name"] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="layout-content">
            <div class="layout-content-body">
                @section('content')
                    <div class="title-bar">
                        <h1 class="title-bar-title">
                            <span class="d-ib">Админпанель</span>
                        </h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Уже зарегистрировано клиентов:</h5>
                            <div class="card-text">
                                <h3 id="client_amount">{{ $clients }}</h3>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="container2" style="width:100%; height:400px;"></div>
                @show
            </div>
        </div>
    </div>
</v-app>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset("js/vendor.min.js") }}"></script>
<script src="{{ asset("js/elephant.min.js") }}"></script>
<script src="{{ asset("js/application.min.js") }}"></script>
<script src="{{ asset("js/custom.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/app.js") }}" defer></script>
</body>
</html>
