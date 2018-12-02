@extends('layouts.app')

@section('content')
    @foreach( $articles as $article)
                <div class="card mb-4">
                    <img class="card-img-top" src="{{ asset('/storage/'.$article->image) }}" style="height: 300px;" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <p>{{ $article->getCategories() }}</p>
                        <p class="card-text">{{ str_limit($article->description,300) }}</p>
                        <a href="{{ route('articles.show',$article) }}" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $article->created_at->format('M d Y') }} by
                        <a href="#">{{ $article->user->email }}</a>
                    </div>
                </div>
    @endforeach
    {{ $articles->links() }}
@endsection

