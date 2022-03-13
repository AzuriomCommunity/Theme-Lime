@extends('layouts.base')

@section('app')
    <header class="header" style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') center / cover no-repeat">
        @include('elements.navbar')

        <div class="container top-header text-center">
            <h2>{{ site_name() }}</h2>
            @if(theme_config('subtitle'))
                <p>{{ theme_config('subtitle') }}</p>
            @endif
        </div>
    </header>

    <main class="container content">
        @include('elements.session-alerts')

        <div class="page-container">
            <div class="page-container-inner px-1 px-md-3 py-3">
                @yield('content')
            </div>
        </div>
    </main>
@endsection
