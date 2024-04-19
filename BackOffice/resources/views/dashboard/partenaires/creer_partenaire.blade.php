@extends('template')

@section('content')

    <!-- // FORMULAIRE CREATION D'UN PARTENAIRE // -->
    <form action="{{ route('partenaires.store') }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf

             <!-- // HEADER DASHBOARD // -->
            <div class="header-form-container">
                <h3 class="mgb-15">Créer un nouveau partenaire</h3>
                <hr class="dashboard-hr">
            </div>

            <!-- // LABEL NOM PARTENAIRE // -->
            <div class="form-group">
                <label for="nom_partenaire" class="text label-dashboard">Nom du partenaire</label>
                <input class="input-box text" type="text" name="nom_partenaire" id="nom_partenaire" value="{{ old('nom_partenaire') }}"/>
                @error('nom_partenaire')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LOGO PARTENAIRE // -->
            <div class="form-group" id="drop-zone">
                <label for="logo_partenaire" class="text label-dashboard" style="text-align: center;">Glisser-déposer le logo du partenaire</label>
                <input class="input-box text" type="file" name="logo_partenaire" id="logo_partenaire" style="display: none;">
                <div id="preview-container" style="display: none;">
                    <img id="preview-image" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
                </div>
                <p class="text">ou</p>
                <p class="text">cliquez ici pour sélectionner une nouvelle image</p>
                @error('logo_partenaire')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LIENS QUI GERE LES LIENS // -->
            <div style="margin: 25px 0 25px 0;">
                <a class="btn green-btn text" href="{{ route('liens.index') }}">Ajouter un réseau social</a>
            </div>

            <!-- // BOUTON POUR AJOUTER UN NOUVEAU LIEN // -->
            <div style="margin: auto;">
                <button type="button" class="btn btn-link text" style="width: 500px;" id="add-lien">Ajouter un autre lien de réseau social</button>
            </div>

            <!-- // MENU DEROULANT POUR LES LIENS VERS LES RESEAUX SOCIAUX // -->
            <div class="form-group">
                <label for="lien_id" class="text label-dashboard">Choisir un lien vers un réseau social</label>
                <select id="lien_id" name="lien_id[]" class="select-menu-dashboard text">
                    @foreach ($liens as $lien)
                        <option value="{{ $lien->id }}">{{ $lien->nom }}</option>
                    @endforeach
                </select>
                @foreach ($errors->get('lien_id.*') as $error)
                    @foreach ($error as $message)
                        <div class="error-text">{{ $message }}</div>
                    @endforeach
                @endforeach
            </div>

            <!-- // LABEL  POUR L'URL DU LIEN // -->
            <div class="form-group">
                <label for="lien_url" class="text label-dashboard">URL du lien</label>
                <input type="text" id="lien_url" name="lien_url[]" class="input-box text">
                @foreach ($errors->get('lien_url.*') as $error)
                    @foreach ($error as $message)
                        <div class="error-text">{{ $message }}</div>
                    @endforeach
                @endforeach
            </div>

            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Créer ce partenaire</button>
            </div>

        </div>
    </form>


    <!-- // SCRIPT // -->

    <!-- // AJOUTER DE NOUVEAU LIENS -->
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
                    <label for="lien_id" class="text label-dashboard">Choisir un lien vers un réseau social</label>
                    <select id="lien_id" name="lien_id[]" class="select-menu-dashboard text">
                        @foreach ($liens as $lien)
                            <option value="{{ $lien->id }}">{{ $lien->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lien_url" class="text label-dashboard">URL du lien</label>
                    <input type="text" id="lien_url" name="lien_url[]" class="input-box text">
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
        const input = document.getElementById('logo_partenaire');

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
