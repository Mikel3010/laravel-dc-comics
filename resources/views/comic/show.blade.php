@extends('layout.app')

@section('page.title')
    {{$comics->title}}
@endsection

@section('page.main')

<div class="container">
    <p>{{$comics->description}}</p>
</div>
@endsection