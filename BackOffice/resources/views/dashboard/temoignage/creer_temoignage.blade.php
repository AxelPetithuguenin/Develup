@extends('template')

@section('content')

    <!-- // FORMULAIRE CREATION D'UN TEMOIGNAGE // -->
    <form action="{{ route('temoignage.store') }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf

            <!-- // HEADER DASHBOARD // -->
            <div class="header-form-container">
                <h3 class="mgb-15">Créer un nouveau témoignage</h3>
                <hr class="dashboard-hr">
            </div>

            <!-- // LABEL TITRE // -->
            <div class="form-group">
                <label for="titre_temoignage" class="text label-dashboard">Titre du témoignage</label>
                <input type="text" class="input-box text" name="titre_temoignage" id="titre_temoignage" value="{{ old('titre_temoignage') }}"/>
                @error('titre_temoignage')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LABEL NOM // -->
            <div class="form-group">
                <label for="prenom_temoignage" class="text label-dashboard">Nom du témoin</label>
                <input type="text" class="input-box text" name="prenom_temoignage" id="prenom_temoignage" value="{{ old('prenom_temoignage') }}"/>
                @error('prenom_temoignage')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // IMAGE DU TEMOIGNAGE // -->
            <div class="form-group">
                <label for="image_temoignage" class="text label-dashboard">Image du témoignage</label>
                <input type="file" class="input-box text" name="image_temoignage" id="image_temoignage"/>
                @error('image_temoignage')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LABEL DATE // -->
            <div class="form-group">
                <label for="date_temoignage" class="text label-dashboard">Date du témoignage</label>
                <input type="date" class="input-box text" name="date_temoignage" id="date_temoignage" value="{{ old('date_temoignage') }}"/>
                @error('date_temoignage')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LABEL CONTENU // -->
            <div class="form-group">
                <label for="contenu_temoignage" class="text label-dashboard">Contenu du témoignage</label>
                <textarea class="input-box text text-area-dashboard" name="contenu_temoignage" id="contenu_temoignage" maxlength="5000"></textarea>
                <div id="characterCount" class="text">6000 caractères restants</div>
                @error('contenu_temoignage')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Créer ce témoignage</button>
            </div>

        </div>
    </form>

    <!-- // SCRIPT // -->
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            CKEDITOR.replace('contenu_temoignage');
        });
    </script>
    

    <script>
        // Fonction pour mettre à jour le nombre de caractères restants
        function updateCharacterCount() {
            // Récupérer le contenu du textarea
            var content = document.getElementById('contenu_temoignage').value;
            
            // Récupérer le nombre de caractères
            var characterCount = content.length;

            // Définir la limite de caractères
            var maxLength = 5000;

            // Calculer le nombre de caractères restants
            var remainingCharacters = maxLength - characterCount;

            // Afficher le nombre de caractères restants
            document.getElementById('characterCount').innerText = remainingCharacters + ' caractères restants';
        }

        // Appeler la fonction pour mettre à jour le nombre de caractères lorsqu'une touche est relâchée dans le textarea
        document.getElementById('contenu_temoignage').addEventListener('input', updateCharacterCount);

        // Appeler la fonction une fois au chargement de la page pour initialiser le compteur
        updateCharacterCount();
    </script>

@stop
