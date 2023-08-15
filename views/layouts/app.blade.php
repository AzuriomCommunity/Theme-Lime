@extends('layouts.base')

@section('app')
    <header class="header" style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') center / cover no-repeat">
        @include('elements.navbar')

        <div class="container header-title position-relative z-2 py-5 text-center">
            <h2 class="text-primary">{{ site_name() }}</h2>
            @if(theme_config('subtitle'))
                <p class="text-light">{{ theme_config('subtitle') }}</p>
            @endif
        </div>
    </header>

    <main class="container content">
        @include('elements.session-alerts')

        <div class="page-container position-relative">
            <div class="bg-body-tertiary px-1 px-md-3 py-3">
                @yield('content')
            </div>
        </div>
    </main>
@endsection
