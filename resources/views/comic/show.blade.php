@extends('layout.app')

@section('page.title')
    {{$comics->title}}
@endsection

@section('page.main')

<div class="container">
    <a href="{{route('comics.index')}}" class="btn btn-primary btn-sm">Torna</a>
    <p>{{$comics->description}}</p>
</div>
@endsection