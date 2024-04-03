@extends('template')
@section('content')

<!-- // FORMULAIRE CREATION D'UNE ACTUALITE // -->
<form action="{{ route('actualites.store') }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
    <div class="formulaire-dashboard-container">
        @csrf

    <!-- // HEADER DASHBOARD // -->
    <div class="header-form-container">
        <h3 class="mgb-15">Créer une nouvelle actualité</h3>
        <hr class="dashboard-hr">
    </div>
    
    <!-- // NOM ACTUALITEE // -->
    <div class="form-group">
        <label for="titre_actualite" class="text label-dashboard">Titre</label>
        <input type="text" class="input-box text" name="titre_actualite" id="titre_actualite" class="form-control"/>
        @error('titre_actualite')
            <div class="error-text">{{ $message }}</div>
         @enderror
    </div>

    <!-- // DATE ACTUALITEE // -->
    <div class="form-group">
        <label for="date_actualite" class="text label-dashboard">Date</label>
        <input type="date" class="input-box text" name="date_actualite" id="date_actualite" class="form-control"/>
        @error('_date_actualite')
            <div class="error-text">{{ $message }}</div>
        @enderror
    </div>

    <!-- // CONTENU ACTUALITEE // -->
    <div class="form-group">
        <label for="contenu_actualite" class="text label-dashboard">Contenu</label>
        <textarea type="text" class="input-box text" name="contenu_actualite" id="contenu_actualite" class="form-control"></textarea>
        @error('contenu_actualite')
            <div class="error-text">{{ $message }}</div>
        @enderror
    </div>
   
    <!-- // IMAGE ACTUALITEE // -->
    <div class="form-group">
        <label for="image_actualite" class="text label-dashboard">Image</label>
        <input type="file" class="input-box text" name="image_actualite" id="image_actualite" class="form-control">
        @error('image_actualite')
            <div class="error-text">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin: 25px 0 25px 0;">
        <button type="submit" class="btn btn-primary ">Ajouter</button>
        </div>
    </div>
</form>
@endsection