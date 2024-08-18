<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('CLIENT_NAME', 'Bazar Tec') }}</title>
    <link href="{{ asset('css/bazar.css') }}" rel="stylesheet" type="text/css">
    @yield('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    @yield('styles')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/bazar.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/favicon-Loja.png">
    @livewireStyles
</head>
<body>
    <div id="full-app-container">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
            <a wire:navigate class="navbar-brand" href="">
                <img src="{{ asset('img/favicon-Loja.png') }}" style="margin-left: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav" style="margin-right: 40px;">
                        <li class="nav-item me-3">
                            <a wire:navigate class="nav-link text-white" href="">
                                Produtos
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a wire:navigate class="nav-link text-white" href="">
                                Categorias
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a wire:navigate class="nav-link text-white" href="">
                                Relatorio de Vendas
                            </a>
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