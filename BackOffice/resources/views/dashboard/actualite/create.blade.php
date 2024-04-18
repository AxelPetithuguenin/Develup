@extends('template')

@section('content')

    <!-- // FORMULAIRE CREATION D'UNE ACTUALITE // -->
    <form action="{{ route('actualites.store') }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf

            <!-- // HEADER DASHBOARD // -->
            <div class="header-form-container">
                <h3 class="mgb-15">Créer une nouvelle actualité</h3>
                <hr class="dashboard-hr">
            </div>
            
            <!-- // NOM ACTUALITEE // -->
            <div class="form-group">
                <label for="titre_actualite" class="text label-dashboard">Titre</label>
                <input type="text" class="input-box text" name="titre_actualite" id="titre_actualite" class="form-control"/>
                @error('titre_actualite')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // DATE ACTUALITEE // -->
            <div class="form-group">
                <label for="_date_actualite" class="text label-dashboard">Date</label>
                <input type="date" class="input-box text" name="_date_actualite" id="_date_actualite" class="form-control"/>
                @error('_date_actualite')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // IMAGE ACTUALITEE // -->
            <div class="form-group">
                <label for="image_actualite" class="text label-dashboard">Image</label>
                <input type="file" class="input-box text" name="image_actualite" id="image_actualite" class="form-control">
                @error('image_actualite')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // CONTENU ACTUALITEE // -->
            <div class="form-group">
                <label for="contenu_actualite" class="text label-dashboard">Contenu</label>
                <textarea class="input-box text text-area-dashboard" name="contenu_actualite" id="contenu_actualite" maxlength="5000"></textarea>
                <div id="characterCount" class="text">5000 caractères restants</div>
                @error('contenu_actualite')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Créer cette actualite</button>
                </div>
            </div>

        </div>
    </form>

    
    <!-- // SCRIPT // -->
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            CKEDITOR.replace('contenu_actualite');
        });
    </script>
    

    <script>
        // Fonction pour mettre à jour le nombre de caractères restants
        function updateCharacterCount() {
            var content = document.getElementById('contenu_actualite').value;
            var characterCount = content.length;
            var maxLength = 5000;
            var remainingCharacters = maxLength - characterCount;
            document.getElementById('characterCount').innerText = remainingCharacters + ' caractères restants';
        }

        // Appeler la fonction pour mettre à jour le nombre de caractères lorsqu'une touche est relâchée dans le textarea
        document.getElementById('contenu_actualite').addEventListener('input', updateCharacterCount);
        updateCharacterCount();
    </script>

@stop
