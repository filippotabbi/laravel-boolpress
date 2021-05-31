@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-md-12 text-center">
                <a href="{{ route('admin.posts.create') }}">Nuovo Post</a>
            </h1>
        </div>
        <div class="row flex">
            @foreach ($posts as $post)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">{{ $post->title }}</div>
                           @if ($post->cover) <img src="{{asset('storage/'.$post->cover)}}" alt="{{$post->title}}">
                          @endif
                          <div class="text-center"> @if ($post->category)
                            <a href="{{route('category.index', ['slug' => $post->category->slug])}}">
                            {{ $post->category->name }}
                            </a>
                            @endif</div>
                        <div class="card-body">
                            {{ $post->content }}
                        </div>
                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary">DELETE</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
