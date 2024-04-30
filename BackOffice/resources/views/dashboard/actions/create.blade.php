@extends('template')
    @section('content')

    <!-- // FORMULAIRE CREATION D'UNE ACTION // -->
    <form action="{{ route('actions.store') }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf

            <!-- // HEADER DASHBOARD // -->
            <div class="header-form-container">
                <h3 class="mgb-15">Créer une nouvelle action</h3>
                <hr class="dashboard-hr">
            </div>
        
            <!-- // NOM ACTION // -->
            <div class="form-group">
                <label for="titre_action" class="text label-dashboard">Titre</label>
                <input type="text" class="input-box text" name="titre_action" id="titre_action" value="{{ old('titre_action') }}"/>
                @error('titre_action')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // DATE ACTION // -->
            <div class="form-group">
                <label for="date_action" class="text label-dashboard">Date</label>
                <input type="date" class="input-box text" name="date_action" id="date_action" value="{{ old('date_action') }}"/>
                @error('date_action')
                    <div class="error-text">{{ $message }}</div>
                @enderror

            </div>

            <!-- // HEURE ACTION // -->
            <div class="form-group">
                <label for="heure_action" class="text label-dashboard">Heure</label>
                <input type="time" class="input-box text" name="heure_action" id="heure_action" value="{{ old('heure_action') }}"/>
                @error('heure_action')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // ADRESSE DE L'ACTION // -->
            <div class="form-group">
                <label for="adresse_action" class="text label-dashboard">Adresse</label>
                <input type="text" class="input-box text" name="adresse_action" id="adresse_action" value="{{ old('adresse_action') }}"/>
                @error('adresse')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- // CODE POSTAL DE L'ACTION // -->
            <div class="form-group">
                <label for="code_postal_action" class="text label-dashboard">Code postal</label>
                <input type="text" class="input-box text" name="code_postal_action" id="code_postal_action" value="{{ old('code_postal_action') }}"/>
                @error('code_postal')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // VILLE DE L'ACTION // -->
            <div class="form-group">
                <label for="ville_action" class="text label-dashboard">Ville</label>
                <input type="text" class="input-box text" name="ville_action" id="ville_action" value="{{ old('ville_action') }}"/>
                @error('ville')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // NOMBRE D'INSCRIT A UNE ACTION // -->
            <div class="form-group">
                <label for="nb_inscrits_action" class="text label-dashboard">Nombre D'inscrits</label>
                <input type="text" class="input-box text" name="nb_inscrits_action" id="nb_inscrits_action" value="{{ old('nb_inscrits_action') }}"/>
                @error('nb_inscrits ')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // ACTION PRIVEE OU NON // -->
            <div class="form-group">
                <label for="is_private_action" class="text label-dashboard">Accessible par les tous le monde </label>
                <div style="display: flex; margin-bottom:15px;">
                    <input type="radio" class="text" name="is_private_action" id="is_private_action" value="1" class="form-control" />
                    <label for="is_private_action" class="text label-dashboard" style="margin-right: 15px;">Oui</label>
        
                    <input type="radio" class="text" name="is_private_action" id="is_private_action" value="0" class="form-control"/>
                    <label for="is_private_action" class="text label-dashboard">Non</label>
                </div>
                @error('is_private')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // NOMBRE SENSIBILISE ACTION  // -->
            <div class="form-group">
                <label for="nb_sensibilises_action" class="text label-dashboard">Nombre de Sensibilisés</label>
                <input type="text" class="input-box text" name="nb_sensibilises_action" id="nb_sensibilises_action" value="{{ old('titre_action') }}"/>
                @error('nb_sensibilises')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            

            <!-- // BOUTON POUR AJOUTER UNE NOUVELLE PHOTO // -->
            <div style="margin: auto;">
                <button type="button" class="btn btn-link text" style="width: 500px;" id="add-photo">Ajouter une autre photo</button>
            </div>

            <!-- // TITRE  // -->
            <div class="form-group">
                <label for="titre" class="text label-dashboard">Titre de l'image</label>
                <input type="text" class="input-box text" name="titre[]" id="titre" value="{{ old('titre') }}"/>
                @foreach ($errors->get('titre.*') as $error)
                    @foreach ($error as $message)
                        <div class="error-text">{{ $message }}</div>
                    @endforeach
                @endforeach
            </div>

            <!-- // IMAGE PAR DEFAULT // -->
            <div class="form-group" id="drop-zone">
                <label for="photo" class="text label-dashboard" style="text-align: center;">Image</label>
                <input class="input-box text" type="file" name="photo[]" id="photo"> 
                <div id="preview-container" style="display: none;">
                    <img id="preview-image" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
                </div>
                @foreach ($errors->get('photo.*') as $error)
                    @foreach ($error as $message)
                        <div class="error-text">{{ $message }}</div>
                    @endforeach
                @endforeach
            </div>

            <!-- // LEGENDE // -->
            <div class="form-group">
                <label for="legende" class="text label-dashboard">Légende de la photo</label>
                <input type="text" class="input-box text" name="legende[]" id="legende" value="{{ old('legende') }}"/>
                @foreach ($errors->get('legende.*') as $error)
                    @foreach ($error as $message)
                        <div class="error-text">{{ $message }}</div>
                    @endforeach
                @endforeach
            </div>
            
            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Créer cette action</button>
            </div>
        
        </div>
    </form>

    <!-- // SCRIPT //  -->

    <!-- // AJOUTER DE NOUVEAU LIENS -->
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
                    <label for="titre" class="text label-dashboard">Titre</label>
                    <input type="text" class="input-box text" name="titre[]" id="titre" class="form-control"/>
                </div>
            
                <div class="form-group" id="drop-zone">
                    <label for="photo" class="text label-dashboard" style="text-align: center;">Image</label>
                    <input class="input-box text" type="file" name="photo[]" id="photo" accept="image/*">
                    <div id="preview-container" style="display: none;">
                        <img id="preview-image" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
                    </div>
                </div>

                <!-- // LEGENDE // -->
                <div class="form-group">
                    <label for="legende" class="text label-dashboard">Legend de la photo</label>
                    <input type="text" class="input-box text" name="legende[]" id="legende" class="form-control"/>
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
    </script>

    <!-- // GLISSER DE L IMAGE // -->
    <script>
        // Récupérer l'élément input pour les fichiers
        const input = document.getElementById('photo');

        // Ajouter un écouteur d'événement pour détecter les changements dans le champ de fichier
        input.addEventListener('change', function(event) {
            const file = event.target.files[0]; // Récupérer le premier fichier sélectionné
            previewFile(file); // Appeler la fonction de prévisualisation
        });

        // Fonction pour prévisualiser le fichier
        function previewFile(file) {
            const reader = new FileReader(); // Créer un objet FileReader

            reader.onloadend = function() {
                const previewImage = document.getElementById('preview-image'); // Récupérer l'élément img de prévisualisation
                previewImage.src = reader.result; // Définir la source de l'image sur les données de fichier lues
                document.getElementById('preview-container').style.display = 'block'; // Afficher le conteneur de prévisualisation
            };

            if (file) {
                reader.readAsDataURL(file); // Lire les données du fichier en tant qu'URL de données
            } else {
                const previewImage = document.getElementById('preview-image'); // Récupérer l'élément img de prévisualisation
                previewImage.src = ''; // Effacer la source de l'image
                document.getElementById('preview-container').style.display = 'none'; // Masquer le conteneur de prévisualisation
            }
        }
    </script>

@stop
