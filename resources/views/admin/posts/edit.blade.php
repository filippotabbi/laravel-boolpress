@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>NUOVO POST</h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control @error('category') is-invalid
                                    @enderror" id="category" name="category_id">
                          <option value="">Select</option>
                           @foreach ($categories as $category )
                            <option value="{{$category->id}}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control @error('title') is-invalid
                                        @enderror" id="title" type="text" name="title"
                            value="{{ old('title', $post->title) }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control @error('content') is-invalid
                                        @enderror" class="form-control" id="content"
                            name="content">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cover">Cover</label>
                      <input class="form-control-file @error('cover') is-invalid
                                  @enderror" class="form-control-file" id="cover" type="file" name="cover" value="">
                        @error('cover')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
