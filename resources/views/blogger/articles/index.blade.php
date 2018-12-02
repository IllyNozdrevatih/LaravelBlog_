@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach( $articles as $article)
            <div class="col-md-4" style="float:left;">
                <div class="card mb-4 box-shadow">
                    <img src={{ asset('/storage/'.$article->image) }} style="height:200px;">
                    <div class="card-body">
                      <p class="card-text">{{ $article->title }}</p>
                      <p>
                        <small class="text-muted" style="font-size:85%">updated at:{{ $article->updated_at->format("d-m-y") }}</small>
                      </p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href={{ route('articles.show',$article)  }} , class="btn btn-sm btn-outline-secondary">View</a>
                            <a href={{ route('articles.edit',$article)  }} , class="btn btn-sm btn-outline-secondary">Edit</a>

                            {{ Form::open(['route' => ['articles.destroy', $article], 'method' => 'delete'])}}
                                <input type="submit" class="btn btn-sm btn-outline-secondary" value="Delete">
                            {{ Form::close() }}
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection