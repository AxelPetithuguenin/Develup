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
                @error('nom')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // PRENOM BUREAU // -->
            <div class="form-group">
                <label for="prenom" class="text label-dashboard">Prénom</label>
                <input class="input-box text" type="text" name="prenom" id="prenom" value="{{ old('prenom') }}"/>
                @error('prenom')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin: 25px 0 25px 0;">
                <a class="btn green-btn text" href="{{route('fonction.index')}}">Ajouter un nouveau rôle</a>
            </div>

            <!-- // PHOTO // -->
            <div class="form-group" id="drop-zone">
            <label for="photo" class="text label-dashboard" style="text-align: center;">Glisser-déposer la photo</label>
            <input class="input-box text" type="file" name="photo" id="photo" style="display: none;">
            <div id="preview-container" style="display: none;">
                <img id="preview-image" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
            </div>
            <p class="text">ou</p>
            <p class="text">cliquez ici pour sélectionner une nouvelle image</p>
            @error('photo')
            <div class="error-text">{{ $message }}</div>
            @enderror
            </div>

            <!-- // BOUTON POUR AJOUTER UN NOUVEAU ROLE // -->
            <div style="margin: auto;">
                <button type="button" class="btn btn-link text" style="width: 500px;" id="add-role">Ajouter un autre role</button>
            </div>

            <!-- // MENU DEROULANT POUR LES ROLES // -->
            <div class="form-group">
                <label for="fonction_id" class="text label-dashboard">Choisir un ou plusieurs rôles</label>
                <select id="fonction_id" name="fonction_id[]" class="select-menu-dashboard text">
                    @foreach ($fonctions as $fonction)
                        <option value="{{ $fonction->id }}">{{ $fonction->role }}</option>
                    @endforeach
                </select>
                @foreach ($errors->get('fonction_id.*') as $error)
                    @foreach ($error as $message)
                        <div class="error-text">{{ $message }}</div>
                    @endforeach
                @endforeach
            </div>

            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Créer ce bureau</button>
            </div>

        </div>
    </form>


    <!-- // SCRIPT // -->

    <!-- // AJOUTER UNE NOUVELLE LISTE DEROULANTE OU SUPPRIMER -->
    <script>
        document.getElementById("add-role").addEventListener("click", function() {
            let newFields = createFields();
            let submitButton = document.querySelector("button[type=submit]");
            submitButton.parentNode.insertBefore(newFields, submitButton);
        });

        function createFields() {
            let newFields = document.createElement("div");
            newFields.innerHTML = `
                <div class="form-group">
                    <label for="fonction_id" class="text label-dashboard">Choisir un ou plusieurs rôles</label>
                    <select id="fonction_id" name="fonction_id[]" class="select-menu-dashboard text">
                        @foreach ($fonctions as $fonction)
                            <option value="{{ $fonction->id }}">{{ $fonction->role }}</option>
                        @endforeach
                    </select>
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
            deleteButton.classList.add("btn", "delete-btn", "delete-lien");
            return deleteButton;
        }
    </script>

    <!-- // GLISSER DE L IMAGE // -->
    <script>
        const dropZone = document.getElementById('drop-zone');
        const input = document.getElementById('photo');

        dropZone.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropZone.classList.add('drag-over');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('drag-over');
        });

        dropZone.addEventListener('drop', (event) => {
            event.preventDefault();
            dropZone.classList.remove('drag-over');
            const files = event.dataTransfer.files;
            input.files = files;
            previewFile(files[0]);
        });

        function previewFile(file) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                const previewImage = document.getElementById('preview-image');
                previewImage.src = reader.result;
                document.getElementById('preview-container').style.display = 'block';
            };
        }

        input.addEventListener('change', (event) => {
            const file = event.target.files[0];
            previewFile(file);
        });
    </script>
@stop