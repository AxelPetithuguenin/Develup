@extends('template')

@section('content')

<form action="{{ route('bureau.update', [$bureaux->id]) }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf
            @method('PUT')

        <!-- // HEADER DASHBOARD // -->
            <div class="header-form-container">
                <h3 class="mgb-15">Modifier bureau</h3>
                <hr class="dashboard-hr">
            </div>

            <!-- // NOM BUREAU // -->
            <div class="form-group">
                <label for="nom" class="text label-dashboard">Nom :</label>
                <input type="text" class="input-box text" name="nom" id="nom" value="{{ isset($bureau) ? $bureau->nom : '' }}" class="form-control"/>
                <!-- @error('nom_partenaire')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div> -->

            <!-- // PRENOM BUREAU // -->
            <div class="form-group">
                <label for="prenom" class="text label-dashboard">Prenom:</label>
                <input type="text" class="input-box text" name="prenom" id="prenom" value="{{ isset($bureau) ? $bureau->prenom : '' }}" class="form-control"/>
            
            <!-- // RÔLE BUREAU // -->
            <div class="form-group">
            <label for="fonctions">Fonctions :</label>
            <select name="fonctions[]" id="fonctions" class="form-control" multiple>
                 @foreach($fonctions as $fonction)
                    <option value="{{ $fonction->id }}" {{ $bureaux->fonctions->contains($fonction->id) ? 'selected' : '' }}>
                        {{ $fonction->role }}
                    </option>
                @endforeach
    </select>
    </div>
                
                
                <!-- // LOGO BUREAU // -->
            <div class="form-group">
                <label for="photo" class="text label-dashboard">Photo :</label>
                <input type="file" class="input-box text" name="photo" id="photo" class="form-control"/>
               <!-- @error('logo_partenaire')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div> -->


              <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Modifier</button>
            </div>
</form>
@stop