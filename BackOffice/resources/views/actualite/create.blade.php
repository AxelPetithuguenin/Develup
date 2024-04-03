@extends('template')
@section('content')
<h1>Ajouter Une Actualité</h1>
<form action="{{ route('actualites.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="titre_actualite" id="titre_actualite" placeholder="Titre de l'actualite">
    </br>
    </br>
    <input type="date" name="date_actualite" id="date_actualite" placeholder="Date de l'actualite">
    </br>
    </br>
    <input type="text" name="contenu_actualite" id="contenu_actualite" placeholder="contenu de l'actualite">
    </br>
    </br>
    <input type="file" class="form-control" id="image_partenaire" name="image_actualite">
    </br>
    </br>
 
    <button type="submit" class="btn btn-primary ">Ajouter</button>
</form>
@endsection