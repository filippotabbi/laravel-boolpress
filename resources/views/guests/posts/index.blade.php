@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row flex">
            @foreach ($posts as $post)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">{{ $post->title }}</div>
                        @if ($post->cover) <img src="{{asset('storage/'.$post->cover)}}" alt="{{$post->title}}">
                     <div class="">
                       @endif
                        <div class="text-center"> @if ($post->category)
                          <a href="{{route('category.index', ['slug' => $post->category->slug])}}">
                          {{ $post->category->name }}
                          </a>
                          @endif</div>
                        <div class="card-body">
                            {{ $post->content }}
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
