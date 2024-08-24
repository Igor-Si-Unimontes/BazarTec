<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('CLIENT_NAME', 'Bazar Tec') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon-Loja.png') }}">
    <link href="{{ asset('css/bazar.css') }}" rel="stylesheet" type="text/css">
    @yield('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    @yield('styles')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/bazar.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    @livewireStyles
    <style>
        .dropdown-menu {
            margin-left: -10px;
            transform: translateX(-50%);
            position: absolute;
            left: 0;
            right: auto;
        }
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
        .dropdown-menu {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div id="full-app-container">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
            <a wire:navigate class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/favicon-Loja.png') }}" style="margin-left: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav" style="margin-right: 40px;">
                        <li class="nav-item me-3">
                            <a class="nav-link text-white" href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link text-white" href="{{ route('produtos.index') }}">
                                Produtos
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link text-white" href="{{ route('categorias.index') }}">
                                Categorias
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link text-white" href="{{ route('vendas.index') }}">
                                Vendas
                            </a>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="relatoriosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Relatórios
                            </a>
                            <div class="dropdown-menu" aria-labelledby="relatoriosDropdown">
                                <a class="dropdown-item" href="{{ route('vendas.downloadPdf') }}">Relatório Geral de Vendas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('vendas.buscar') }}">Buscar Vendas por Produto</a>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    @livewireScripts
    </body>
</html>