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
                <input type="text" class="input-box text" name="nom" id="nom" value="{{ isset($bureaux) ? $bureaux->nom : '' }}" class="form-control"/>
                @error('nom')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div> 

            <!-- // PRENOM BUREAU // -->
            <div class="form-group">
                <label for="prenom" class="text label-dashboard">Prénom :</label>
                <input type="text" class="input-box text" name="prenom" id="prenom" value="{{ isset($bureaux) ? $bureaux->prenom : '' }}" class="form-control"/>
                @error('prenom')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LOGO BUREAU // -->
            <div class="form-group" id="drop-zone">
                <label for="photo" class="text label-dashboard" style="text-align: center;">Glisser-déposer une photo</label>
                <input type="file" class="input-box text" name="photo" id="photo" style="display: none;">
                <div id="logo-preview-container">
                    @if ($bureaux->photo)
                        <img id="logo-preview" src="{{ asset('BackOffice/public/storage/pdp/' . $bureaux->photo) }}" alt="Preview" style="max-width: 100%; max-height: 200px;">
                    @else
                        <p class="text">Aucune image sélectionnée</p>
                    @endif
                </div>
                <p class="text">ou</p>
                <p class="text">cliquez ici pour sélectionner une nouvelle image</p>
                @error('photo')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // BOUTON POUR AJOUTER UN NOUVEAU ROLE // -->
            <div style="margin: auto;">
                <button type="button" class="btn btn-link text" style="width: 500px; margin:15px;" id="add-role">Ajouter un rôle</button>
            </div>

            <!-- // MENU DEROULANT POUR LES ROLES // -->
            @foreach($bureaux->fonctions as $fonction_bureau)
                <div id="role_container_{{ $fonction_bureau->id }}">
                    <div class="form-group" style="margin: 25px 0;">
                        <label for="fonction_id_{{ $fonction_bureau->id }}" class="text label-dashboard">Choisir un rôle</label>
                        <select id="fonction_id_{{ $fonction_bureau->id }}" name="fonction_id[]" class="select-menu-dashboard text">
                            @foreach($fonctions as $fonction)
                                <option value="{{ $fonction->id }}" {{ $fonction_bureau->id == $fonction->id ? 'selected' : '' }}>
                                    {{ $fonction->role }}
                                </option>
                            @endforeach
                        </select>
                        @foreach ($errors->get('fonction_id.*') as $error)
                            @foreach ($error as $message)
                                <div class="error-text">{{ $message }}</div>
                            @endforeach
                        @endforeach
                    </div>

                    <!-- Bouton de suppression -->
                    <button type="button" class="delete-btn text" onclick="removeLink('{{ $fonction_bureau->id }}')">Supprimer</button>
                </div>
            @endforeach                    

            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Modifier</button>
            </div>
        </div>
    </form>

    <!-- // SCRIPT // -->
    <script>
        function removeLink(RoleId) {
            // Supprimer le bloc de lien correspondant
            var linkContainer = document.getElementById('role_container_' + RoleId);
            linkContainer.parentNode.removeChild(linkContainer);
        }
    </script>   

    <!-- // AJOUTER DES LIENS // -->
    <script>
        document.getElementById("add-role").addEventListener("click", function() {
            let newFields = createFields();
            let submitButton = document.querySelector("button[type=submit]");
            submitButton.parentNode.insertBefore(newFields, submitButton);
        });

        function createFields() {
            let newFields = document.createElement("div");
            newFields.innerHTML = `
                <div class="form-group" style="margin: 25px 0;">
                    <label for="fonction_id_{{ $fonction_bureau->id }}" class="text label-dashboard">Choisir un rôle</label>
                    <select id="fonction_id_{{ $fonction_bureau->id }}" name="fonction_id[]" class="select-menu-dashboard text">
                        @foreach($fonctions as $fonction)
                            <option value="{{ $fonction->id }}" {{ $fonction_bureau->id == $fonction->id ? 'selected' : '' }}>
                                {{ $fonction->role }}
                            </option>
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
                const imagePreview = document.getElementById('logo-preview');
                imagePreview.src = reader.result;
                document.getElementById('logo-preview-container').style.display = 'block';
            };
        }

        input.addEventListener('change', (event) => {
            const file = event.target.files[0];
            previewFile(file);
        });
    </script>

@stop
