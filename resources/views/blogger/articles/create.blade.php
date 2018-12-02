@extends('layouts.app')

@section('content')
        {{ Form::open(['route' => ['articles.store'] , 'method' => 'post','files' => true  ]) }}
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Title</label>
                <div class="col-10">
                    <input class="form-control" name="title" type="text" id="example-text-input">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Description</label>
                <textarea class="form-control" name="description" id="exampleTextarea" rows="3"></textarea>
            </div>
            <div class="form-group">
                <div><label for="exampleTextarea">Image</label></div>
                <input name="image" type="file" id="example-text-input">
            </div>
            @foreach( $categories as $category)
                <input name=categories[] type="checkbox" value={{ $category->id }}>{{ $category->name }}
            @endforeach
            <input type="submit" value="Создать" class="btn btn-primary">
        {{ Form::close() }}
        <a href="{{ url()->previous() }}" class="h5 text-primary">Назад</a>
@endsection