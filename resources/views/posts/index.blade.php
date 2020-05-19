@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)

                    <div class="card mb-4">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            <div class="card-title">{{$post->title}}</div>
                            <div class="card-text">{{$post->sub_body}}</div>
                            <a href="{{ route('posts.show', $post)  }}">Leer mas</a>
                            <p class="text-muted mb-0">
                                <em> - {{ $post->user->name }}</em>
                            </p>
                            {{ $post->created_at->format('d M Y')  }}

                            You are logged in!
                        </div>
                    </div>
                @endforeach
                <!-- Muestra el paginador-->
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
