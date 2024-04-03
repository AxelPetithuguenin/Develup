@extends('template')
@section('content')
<h1>Modifier une Actualité</h1>
<form action="{{ route('actualites.update', [$actualite['id']]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <input type="text" name="titre_actualite" id="titre_actualite" placeholder="Nom de l'actualite"  
    value="{{$actualite->titre_actualite}}" />
    </br>
    </br>
    <input type="date" name="date_actualite" id="date_actualite" placeholder="Date de l'actualite"
    value="{{$actualite->_date_actualite}}" />
    </br>
    </br>
    <textarea type="text" name="contenu_actualite" id="contenu_actualite" placeholder="contenu de l'actualite"
    value="{{$actualite->contenu_actualite}}"></textarea>
    </br>
    </br>
    <input type="file" class="form-control" id="image_actualite" name="image_actualite">
    </br>
    </br>
 
    <button type="submit" class="btn btn-primary ">Ajouter</button>
</form>
@endsection