@extends('layouts.app')

@section('title', trans('messages.home'))

@section('content')
    @if($message)
        <div class="card mb-5">
            <div class="card-body">
                {{ $message }}
            </div>
        </div>
    @endif

    @if(! $servers->isEmpty())
        <h2 class="text-center">{{ trans('messages.servers') }}</h2>

        <div class="row gy-3 justify-content-center mb-5">
            @foreach($servers as $server)
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <h3 class="card-title">
                                {{ $server->name }}
                            </h3>

                            @if($server->isOnline())
                                <div class="progress mb-1">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $server->getPlayersPercents() }}%">
                                    </div>
                                </div>

                                <p class="mb-1">
                                    {{ trans_choice('messages.server.total', $server->getOnlinePlayers(), [
                                        'max' => $server->getMaxPlayers(),
                                    ]) }}
                                </p>
                            @else
                                <p>
                                    <span class="badge bg-danger text-white">
                                        {{ trans('messages.server.offline') }}
                                    </span>
                                </p>
                            @endif

                            @if($server->joinUrl())
                                <a href="{{ $server->joinUrl() }}" class="btn btn-primary">
                                    {{ trans('messages.server.join') }}
                                </a>
                            @else
                                <p class="card-text">{{ $server->fullAddress() }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if(!$posts->isEmpty())
        <h2 class="text-center">{{ trans('messages.news') }}</h2>

        <div class="row gx-0 gy-3">
            @foreach($posts as $post)
                @if($post->imageUrl())
                    <div class="col-md-4">
                        <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="img-fluid">
                    </div>
                @endif

                <div class="col-md-{{ $post->imageUrl() ? 8 : 12 }}">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <h3>{{ $post->title }}</h3>

                            <p>{{ Str::limit(strip_tags($post->content), 250) }}</p>

                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">
                                {{ trans('messages.posts.read') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
