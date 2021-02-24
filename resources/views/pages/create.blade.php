@extends('template.main')
@section('content')
<section class="container text-center">
        <h1>Ajouter un nouveau livre</h1>

        {{-- message d'erreur --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="add-book" method="POST">
            @csrf
            <div>
                <label for="">Nom de l'auteur : </label>
                <input type="text" name="name">  
            </div>
            <div>
                <label for="">Description : </label>
                <input type="text" name="text">  
            </div>
            <div>
                <label for="">Note attribuée : </label>
                <input type="text" name="score">  
            </div>
            <button class="btn btn-warning" type="submit">Ajouter</button>
        </form>
</section>

@endsection