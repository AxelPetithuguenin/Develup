@extends('template')

@section('content')

    <!-- // FORMULAIRE CREATION D'UN PARTENAIRE // -->
    <form action="{{ route('partenaires.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- // LSITES DES PARTENAIRES // -->
        <h3>Créer un nouveau partenaire</h3>

        <!-- // LABEL NOM PARTENAIRE // -->
        <div class="form-group">
            <label for="nom_partenaire">Nom du partenaire</label>
            <input type="text" name="nom_partenaire" id="nom_partenaire" value="{{ old('nom_partenaire') }}"/>
            @error('nom_partenaire')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- // LOGO PARTENAIRE // -->
        <div class="form-group">
            <label for="logo_partenaire">Logo du partenaire</label>
            <input type="file" name="logo_partenaire" id="logo_partenaire"/>

            @error('logo_partenaire')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>
        
        <br>

        <!-- // LIENS QUI GERE LES LIENS // -->
        <a href="{{ route('liens.index') }}" class="btn">Ajouter un réseau social</a>
        
        <br>

        <!-- // BOUTON POUR AJOUTER UN NOUVEAU LIEN // -->
        <button type="button" class="btn btn-primary" id="add-lien">Ajouter un autre lien de réseau social</button>

        <br>

        <!-- // MENU DEROULANT POUR LES LIENS VERS LES RESEAUX SOCIAUX // -->
        <div class="form-group">
            <label for="lien_id">Choisir un lien vers un réseau social</label>
            <select id="lien_id" name="lien_id[]" class="form-control">
                @foreach ($liens as $lien)
                    <option value="{{ $lien->id }}">{{ $lien->nom }}</option>
                @endforeach
            </select>
        </div>

        <!-- // LABEL  POUR L'URL DU LIEN // -->
        <div class="form-group">
            <label for="lien_url">URL du lien</label>
            <input type="text" id="lien_url" name="lien_url[]" class="form-control" placeholder="URL du lien">
        </div>

        <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
        <button type="submit" class="btn btn-success">Créer ce partenaire</button>
    </form>


    <!-- // SCRIPT // -->
    <script>
        document.getElementById("add-lien").addEventListener("click", function() {
            let newFields = createFields();
            let submitButton = document.querySelector("button[type=submit]");
            submitButton.parentNode.insertBefore(newFields, submitButton);
        });

        function createFields() {
            let newFields = document.createElement("div");
            newFields.innerHTML = `
                <div class="form-group">
                    <label for="lien_id">Choisir un lien vers un réseau social</label>
                    <select id="lien_id" name="lien_id[]" class="form-control">
                        @foreach ($liens as $lien)
                            <option value="{{ $lien->id }}">{{ $lien->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lien_url">URL du lien</label>
                    <input type="text" id="lien_url" name="lien_url[]" class="form-control" placeholder="URL du lien">
                </div>
            `;

            let deleteButton = createDeleteButton();
            newFields.appendChild(deleteButton);

            deleteButton.addEventListener("click", function() {
                newFields.remove();
            });

            return newFields;
        }

        function createDeleteButton() {
            let deleteButton = document.createElement("button");
            deleteButton.textContent = "Supprimer";
            deleteButton.type = "button";
            deleteButton.classList.add("btn", "btn-danger", "delete-lien");
            return deleteButton;
        }
    </script>

@stop
