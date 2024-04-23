@extends('template')
@section('content')

 <!-- // FORMULAIRE CREATION D'UN PARTENAIRE // -->
 <form action="{{ route('bureau.store') }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf

             <!-- // HEADER DASHBOARD // -->
            <div class="header-form-container">
                <h3 class="mgb-15">Créer un nouveau bureau</h3>
                <hr class="dashboard-hr">
            </div>

            <!-- // NOM BUREAU // -->
            <div class="form-group">
                <label for="nom" class="text label-dashboard">Nom</label>
                <input class="input-box text" type="text" name="nom" id="nom_partenaire" value="{{ old('nom') }}"/>
            </div>

            <!-- // PRENOM BUREAU // -->
            <div class="form-group">
                <label for="prenom" class="text label-dashboard">Prénom</label>
                <input class="input-box text" type="text" name="prenom" id="prenom" value="{{ old('prenom') }}"/>
            </div>

            <div style="margin: 25px 0 25px 0;">
                <a class="btn green-btn text" href="{{route('fonction.index')}}">Ajouter un nouveau rôle</a>
            </div>

            <!-- // LOGO PARTENAIRE // -->
            <div class="form-group">
                <label for="photo" class="text label-dashboard">Photo</label>
                <input class="input-box text" type="file" name="photo" id="photo"/>
            </div>

            <!-- // MENU DEROULANT POUR LES ROLES // -->
            <div class="form-group">
                <label for="fonction_id" class="text label-dashboard">Choisir un ou plusieurs rôles</label>
                <select id="fonction_id" name="fonction_id[]" class="select-menu-dashboard text" multiple>
                    @foreach ($fonctions as $fonction)
                        <option value="{{ $fonction->id }}">{{ $fonction->role }}</option>
                    @endforeach
                </select>
            </div>


            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Créer ce bureau</button>
            </div>

        </div>
    </form>
@stop