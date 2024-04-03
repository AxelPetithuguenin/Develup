@extends('template')

@section('content')

    <!-- // FORMULAIRE CREATION D'UN TEMOIGNAGE // -->
    <form action="{{ route('temoignage.update', [$temoignage->id]) }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf
            @method('PUT')

            <!-- // HEADER DASHBOARD // --> 
            <div class="header-form-container">
                <h3 class="mgb-15">Modifier un témoignage</h3>
                <hr class="dashboard-hr">
            </div>

            <!-- // LABEL TITRE // -->
            <div class="form-group">
                <label for="titre_temoignage" class="text label-dashboard">Titre du témoignage</label>
                <input type="text" class="input-box text" name="titre_temoignage" id="titre_temoignage" value="{{ $temoignage->titre_temoignage }}"/>
                @error('titre_temoignage')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LABEL NOM // -->
            <div class="form-group">
                <label for="prenom_temoignage" class="text label-dashboard">Nom du témoins</label>
                <input type="text" class="input-box text" name="prenom_temoignage" id="prenom_temoignage" value="{{ $temoignage->prenom_temoignage }}"/>
                @error('prenom_temoignage')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // IMAGE DU TEMOIGNAGE // -->
            <div class="form-group">
                <label for="image_temoignage" class="text label-dashboard">Image du témoignage</label>
                <input type="file" class="input-box text" name="image_temoignage" id="image_temoignage"/>
                @error('image_temoignage')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LABEL DATE // -->
            <div class="form-group">
                <label for="date_temoignage" class="text label-dashboard">Date du témoignage</label>
                <input type="date" class="input-box text" name="date_temoignage" id="date_temoignage" value="{{ $temoignage->date_temoignage }}"/>
                @error('date_temoignage')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LABEL CONTENU // -->
            <div class="form-group">
                <label for="contenu_temoignage" class="text label-dashboard">Contenu du témoignage</label>
                <textarea class="input-box text" name="contenu_temoignage" id="contenu_temoignage">{{ $temoignage->contenu_temoignage }}</textarea>
                @error('contenu_temoignage')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Modifier ce témoignage</button>
            </div>

        </div>
    </form>

@stop
