@extends('layout.app')

@section('page.title')
    Modifica comic: {{ $comics->title }}
@endsection

@section('page.main')

<div class="container">
    <a href="{{route('comics.index')}}" class="btn btn-primary btn-sm">Torna</a>
    
    <form action="{{route('comics.update', $comics->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$comics->title}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description">{{$comics->description}}</textarea>
        </div>
          <div class="mb-3">
            <label for="thumb" class="form-label">thumb</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{$comics->thumb}}">
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{$comics->price}}">
          </div>
          <div class="mb-3">
            <label for="series" class="form-label">series</label>
            <input type="text" class="form-control" id="series" name="series" value="{{$comics->series}}">
          </div>
          <div class="mb-3">
            <label for="sale_date" class="form-label">sale date</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date" value="{{$comics->sale_date}}">
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{$comics->type}}">
          </div>
          <div class="mb-3">
            <label for="artists" class="form-label">artists</label>
            <input type="text" class="form-control" id="artists" name="artists" value="{{$comics->artists}}">
          </div>
          <div class="mb-3">
            <label for="writers" class="form-label">writers</label>
            <input type="text" class="form-control" id="writers" name="writers" value="{{$comics->writers}}">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection