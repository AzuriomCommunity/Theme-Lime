@extends('layouts.app')

@section('title', trans('messages.home'))

@section('content')
    @if($message)
        <div class="card mb-4">
            <div class="card-body">
                {{ $message }}
            </div>
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
