@extends('layout.app')

@section('page.title')
    Elenco Comics
@endsection

@section('page.main')
<a href="{{route('comics.create')}}" class="btn btn-success">Crea Nuovo Comic</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nome Comic</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Serie</th>
        <th scope="col">Data vendita</th>
        <th scope="col">Tipo</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($comics as $comic)
      <tr>
        <td>{{$comic->title}}</td>
        <td>{{$comic->price}}</td>
        <td>{{$comic->series}}</td>
        <td>{{$comic->sale_date}}</td>
        <td>{{$comic->type}}</td>
        <td><a href="{{route('comics.show', $comic->id)}}" class="btn btn-primary btn-sm">Descrizione</a>
        <form action="{{ route('comics.destroy', $comic->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Cancella">
        
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection