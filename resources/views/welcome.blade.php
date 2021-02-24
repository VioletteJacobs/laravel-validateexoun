@extends('template.main')
@section('content')
    <section class= "container">
        <h1 class="text-center">Voici la liste de nos livres : </h1>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Texte</th>
                <th scope="col">Note</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($DBBook as $item) 
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->text}}</td>
                <td>{{$item->score}}</td>
                <td>
                    <form action="delete-book/{{$item->id}}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
                <td><a href="/book-edit/{{$item->id}}" class="btn btn-warning">Modifier</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>

    </section>
@endsection