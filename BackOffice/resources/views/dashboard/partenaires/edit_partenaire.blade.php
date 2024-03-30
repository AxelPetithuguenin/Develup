@extends('template')

@section('content')

    <!-- // FORMULAIRE MODIFICATION D'UN PARTENAIRE // -->
    <h3>Modifier un partenaire</h3>

    <form action="{{ route('partenaires.update', [$partenaires->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- // NOM PARTENAIRE // -->
        <div class="form-group">
            <label for="nom_partenaire">Nom :</label>
            <input type="text" name="nom_partenaire" id="nom_partenaire" value="{{ isset($partenaires) ? $partenaires->nom_partenaire : '' }}" class="form-control"/>
            @error('nom_partenaire')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- // LOGO PARTENAIRE // -->
        <div class="form-group">
            <label for="logo_partenaire">Logo :</label>
            <input type="file" name="logo_partenaire" id="logo_partenaire" class="form-control"/>
            @error('logo_partenaire')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- // BOUTON POUR AJOUTER UN NOUVEAU LIEN // -->
        <button type="button" class="btn btn-primary" id="add-lien">Ajouter un autre lien de réseau social</button>

        <br>

        <!-- // MENU DEROULANT POUR LES LIENS VERS LES RESEAUX SOCIAUX // -->
        @foreach($partenaires->liens as $lien)
            <div class="form-group">
                <label for="lien_id_{{ $lien->id }}">Choisir un lien vers un réseau social</label>
                <select id="lien_id_{{ $lien->id }}" name="lien_id[]" class="form-control">
                    @foreach ($liens as $link)
                        <option value="{{ $link->id }}" {{ $lien->id == $link->id ? 'selected' : '' }}>{{ $link->nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- // LABEL POUR L'URL DU LIEN // -->
            <div class="form-group">
                <label for="lien_url_{{ $lien->id }}">URL du lien :</label>
                <input type="text" name="lien_url[]" id="lien_url_{{ $lien->id }}" value="{{ $lien->pivot->lien }}" class="form-control"/>
            </div>
        @endforeach

        <button type="submit" class="btn">Modifier</button>
    </form>

@stop
