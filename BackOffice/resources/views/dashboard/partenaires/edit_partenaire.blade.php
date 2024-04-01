@extends('template')

@section('content')

    <form action="{{ route('partenaires.update', [$partenaires->id]) }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf
            @method('PUT')

            <!-- // HEADER DASHBOARD // -->
            <div class="header-form-container">
                <h3 class="mgb-15">Modifier partenaire</h3>
                <hr class="dashboard-hr">
            </div>

            <!-- // NOM PARTENAIRE // -->
            <div class="form-group">
                <label for="nom_partenaire" class="text label-dashboard">Nom :</label>
                <input type="text" class="input-box text" name="nom_partenaire" id="nom_partenaire" value="{{ isset($partenaires) ? $partenaires->nom_partenaire : '' }}" class="form-control"/>
                @error('nom_partenaire')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LOGO PARTENAIRE // -->
            <div class="form-group">
                <label for="logo_partenaire" class="text label-dashboard">Logo :</label>
                <input type="file" class="input-box text" name="logo_partenaire" id="logo_partenaire" class="form-control"/>
                @error('logo_partenaire')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // BOUTON POUR AJOUTER UN NOUVEAU LIEN // -->
            <div style="margin: auto;">
                <button type="button" class="btn btn-link text" style="width: 500px; margin:15px;" id="add-lien">Ajouter un autre lien de réseau social</button>
            </div>

            <!-- // MENU DEROULANT POUR LES LIENS VERS LES RESEAUX SOCIAUX // -->
            @foreach($partenaires->liens as $lien)
                <div class="form-group">
                    <label for="lien_id_{{ $lien->id }}" class="text label-dashboard">Choisir un lien vers un réseau social</label>
                    <select id="lien_id_{{ $lien->id }}" name="lien_id[]" class="select-menu-dashboard text">
                        @foreach ($liens as $link)
                            <option value="{{ $link->id }}" {{ $lien->id == $link->id ? 'selected' : '' }}>{{ $link->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- // LABEL POUR L'URL DU LIEN // -->
                <div class="form-group">
                    <label for="lien_url_{{ $lien->id }}" class="text label-dashboard">URL du lien :</label>
                    <input type="text" class="input-box text" name="lien_url[]" id="lien_url_{{ $lien->id }}" value="{{ $lien->pivot->lien }}"/>
                </div>
            @endforeach

             <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Modifier</button>
            </div>

        </div>
    </form>

@stop
