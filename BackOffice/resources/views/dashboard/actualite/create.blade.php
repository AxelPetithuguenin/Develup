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
                <input type="text" class="input-box text" name="titre_actualite" id="titre_actualite" value="{{ old('titre_actualite') }}"/>
                @error('titre_actualite')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // DATE ACTUALITEE // -->
            <div class="form-group">
                <label for="_date_actualite" class="text label-dashboard">Date</label>
                <input type="date" class="input-box text" name="_date_actualite" id="_date_actualite" value="{{ old('_date_actualite') }}"/>
                @error('_date_actualite')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // IMAGE ACTUALITEE // -->
            <div class="form-group" id="drop-zone">
                <label for="image_actualite" class="text label-dashboard">Glisser-déposer une image du témoignage</label>
                <input type="file" class="input-box text" name="image_actualite" id="image_actualite" style="display: none;">
                <div id="image-preview-container" style="display: none;">
                    <img id="image-preview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
                </div>
                <p class="text">ou</p>
                <p class="text">cliquez ici pour sélectionner une image</p>
                @error('image_actualite')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // CONTENU ACTUALITEE // -->
            <div class="form-group">
                <label for="contenu_actualite" class="text label-dashboard">Contenu</label>
                <textarea class="input-box text text-area-dashboard" name="contenu_actualite" id="contenu_actualite" maxlength="4000"> {{ old('contenu_actualite') }}</textarea>
                <div id="characterCount" class="text">4000 caractères restants</div>
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
            var maxLength = 4000;
            var remainingCharacters = maxLength - characterCount;
            document.getElementById('characterCount').innerText = remainingCharacters + ' caractères restants';
        }

        // Appeler la fonction pour mettre à jour le nombre de caractères lorsqu'une touche est relâchée dans le textarea
        document.getElementById('contenu_actualite').addEventListener('input', updateCharacterCount);
        updateCharacterCount();
    </script>

    <!-- // GLISSER DE L IMAGE // -->
    <script>
    const dropZone = document.getElementById('drop-zone');
    const input = document.getElementById('image_actualite');

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
            const imagePreview = document.getElementById('image-preview');
            imagePreview.src = reader.result;
            document.getElementById('image-preview-container').style.display = 'block';
        };
    }

    input.addEventListener('change', (event) => {
        const file = event.target.files[0];
        previewFile(file);
    });
</script>

<style>
        #drop-zone {
            margin: 35px 0;
            border: 2px dashed green;
            padding: 35px 20px;
            text-align: center;
            cursor: pointer;
        }

        #drop-zone.drag-over {
            background-color: #f0f0f0;
        }

        #image-temoignage-preview-container {
            margin-top: 10px;
        }

        </style>
@stop
