@extends('template')
@section('content')

<!-- FORMULAIRE DE MODIFICATION D'UNE ACTION -->
<form action="{{ route('actions.update', ['action' => $action->id]) }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
    <div class="formulaire-dashboard-container">
        @csrf
        @method('PUT')

        <!-- HEADER DU FORMULAIRE -->
        <div class="header-form-container">
            <h3 class="mgb-15">Modifier l'action</h3>
            <hr class="dashboard-hr">
        </div>
    
        <!-- TITRE DE L'ACTION -->
        <div class="form-group">
            <label for="titre_action" class="text label-dashboard">Titre</label>
            <input type="text" class="input-box text" name="titre_action" id="titre_action" value="{{ $action->titre_action }}"/>
            @error('titre_action')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- DATE DE L'ACTION -->
        <div class="form-group">
            <label for="date_action" class="text label-dashboard">Date</label>
            <input type="date" class="input-box text" name="date_action" id="date_action" value="{{ $action->date_action }}"/>
            @error('date_action')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- HEURE DE L'ACTION -->
        <div class="form-group">
            <label for="heure_action" class="text label-dashboard">Heure</label>
            <input type="time" class="input-box text" name="heure_action" id="heure_action" value="{{ $action->heure_action }}"/>
            @error('heure_action')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- ADRESSE DE L'ACTION -->
        <div class="form-group">
            <label for="adresse_action" class="text label-dashboard">Adresse</label>
            <input type="text" class="input-box text" name="adresse_action" id="adresse_action" value="{{ $action->adresse }}"/>
            @error('adresse_action')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- CODE POSTAL DE L'ACTION -->
        <div class="form-group">
            <label for="code_postal_action" class="text label-dashboard">Code postal</label>
            <input type="text" class="input-box text" name="code_postal_action" id="code_postal_action" value="{{ $action->code_postal }}"/>
            @error('code_postal_action')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- VILLE DE L'ACTION -->
        <div class="form-group">
            <label for="ville_action" class="text label-dashboard">Ville</label>
            <input type="text" class="input-box text" name="ville_action" id="ville_action" value="{{ $action->ville }}"/>
            @error('ville_action')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- NOMBRE D'INSCRITS A L'ACTION -->
        <div class="form-group">
            <label for="nb_inscrits_action" class="text label-dashboard">Nombre d'inscrits</label>
            <input type="text" class="input-box text" name="nb_inscrits_action" id="nb_inscrits_action" value="{{ $action->nb_inscrits }}"/>
            @error('nb_inscrits_action')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- ACTION PRIVEE OU NON -->
        <div class="form-group">
            <label for="is_private_action" class="text label-dashboard">Accessible par tous</label>
            <div style="display: flex; margin-bottom:15px;">
                <input type="radio" class="text" name="is_private_action" id="is_private_action_oui" value="1" class="form-control" {{ $action->is_private == 1 ? 'checked' : '' }}/>
                <label for="is_private_action_oui" class="text label-dashboard" style="margin-right: 15px;">Oui</label>
    
                <input type="radio" class="text" name="is_private_action" id="is_private_action_non" value="0" class="form-control" {{ $action->is_private == 0 ? 'checked' : '' }}/>
                <label for="is_private_action_non" class="text label-dashboard">Non</label>
            </div>
            @error('is_private_action')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- NOMBRE DE SENSIBILISES -->
        <div class="form-group">
            <label for="nb_sensibilises_action" class="text label-dashboard">Nombre de sensibilisés</label>
            <input type="text" class="input-box text" name="nb_sensibilises_action" id="nb_sensibilises_action" value="{{ $action->nb_sensibilises }}"/>
            @error('nb_sensibilises_action')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- BOUTON POUR AJOUTER UNE NOUVELLE PHOTO -->
        <div style="margin: auto;">
            <button type="button" class="btn btn-link text" style="width: 500px;" id="add-photo">Ajouter une autre photo</button>
        </div>

        <!-- TITRE DE L'IMAGE -->
        <div class="form-group">
            <label for="titre" class="text label-dashboard">Titre de l'image</label>
            <input type="text" class="input-box text" name="titre[]" id="titre"  value="{{ $action->titre }}"/>
        </div>

        <!-- IMAGE PAR DEFAULT -->
        <div class="form-group" id="drop-zone">
            <label for="photo" class="text label-dashboard" style="text-align: center;">Image</label>
            <input class="input-box text" type="file" name="photo[]" id="photo" accept="image/*">
            <div id="preview-container" style="display: none;">
                <img id="preview-image" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
            </div>
        </div>

        <!-- LEGENDE -->
        <div class="form-group">
            <label for="legende" class="text label-dashboard">Légende de la photo</label>
            <input type="text" class="input-box text" name="legende[]" id="legende"  value="{{ $action->legende }}"/>
        </div>
        
        <!-- BOUTON DE SOUMISSION DU FORMULAIRE -->
        <div style="margin: 25px 0 25px 0;">
            <button type="submit" class="btn green-btn text">Modifier cette action</button>
        </div>
    
    </div>
</form>

<!-- SCRIPT -->
<script>
    document.getElementById("add-photo").addEventListener("click", function() {
        let newFields = createFields();
        let submitButton = document.querySelector("button[type=submit]");
        submitButton.parentNode.insertBefore(newFields, submitButton);
    });

    function createFields() {
        let newFields = document.createElement("div");
        newFields.innerHTML = `
            <div class="form-group">
                <label for="titre" class="text label-dashboard">Titre de l'image</label>
                <input type="text" class="input-box text" name="titre[]"  value="{{ $action->titre }}"/>
            </div>
        
            <div class="form-group" id="drop-zone">
                <label for="photo" class="text label-dashboard" style="text-align: center;">Image</label>
                <input class="input-box text" type="file" name="photo[]" accept="image/*">
                <div id="preview-container" style="display: none;">
                    <img id="preview-image" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
                </div>
            </div>

            <div class="form-group">
                <label for="legende" class="text label-dashboard">Légende de la photo</label>
                <input type="text" class="input-box text" name="legende[]"  value="{{ $action->legende }}"/>
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
    
    // Afficher ou masquer les erreurs de validation côté client
    document.addEventListener("DOMContentLoaded", function() {
        let errorMessages = document.querySelectorAll('.error-text');
        errorMessages.forEach(function(error) {
            error.style.display = "none";
        });
    });

    // Prévisualisation de l'image avant de la télécharger
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
