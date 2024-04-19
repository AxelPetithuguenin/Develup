@extends('template')

@section('content')

    <!-- // FORMULAIRE CREATION D'UN LIENS // -->
    <form action="{{ route('liens.store') }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf

            <!-- // HEADER DASHBOARD // -->
            <div class="header-form-container">
                <h3 class="mgb-15">Créer un nouveau réseau social</h3>
                <hr class="dashboard-hr">
            </div>

            <!-- // LABEL NOM DU RESEAU SOCIAL // -->
            <div class="form-group">
                <label for="nom" class="text label-dashboard">Nom du réseau social</label>
                <input type="text" class="input-box text" name="nom" id="nom" value="{{ old('nom') }}"/>
                @error('nom')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // TEXT // -->
            <div class="text-container-information-icone" style="margin: 50px 0 10px 0; text-align: justify;">
                <p class="text">
                    Afin d'avoir une meilleure expérience, nous vous recommandons de vous rendre sur le site 
                    <a href="https://remixicon.com/" class="link">Remixicon</a>
                    et de choisir votre îcone et de le télécharger en "SVG".
                </p>
            </div>

            <!-- // ICON DU RESEAUX SOCIAUX // -->
            <div id="drop-zone" class="form-group">
                <label for="icone" class="text label-dashboard" style="text-align: center;">Icône du réseau social</label>
                <input type="file" class="input-box text" name="icone" id="icone" style="display: none;">
                <div id="icone-preview-container" style="display: none;">
                    <img id="icone-preview" src="#" alt="Preview" style="max-width: 100%; max-height: 100px;">
                </div>
                <p class="text">Glisser-déposer une icône SVG ici</p>
                @error('icone')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Créer ce réseau social</button>
            </div>

        </div>
    </form>

    <!-- // SCRIPT // -->

    <!-- // PREVIEW DE L IMAGE -->
    <script>
        const dropZone = document.getElementById('drop-zone');
        const input = document.getElementById('icone');

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
                const iconePreview = document.getElementById('icone-preview');
                iconePreview.src = reader.result;
                document.getElementById('icone-preview-container').style.display = 'block';
            };
        }

        input.addEventListener('change', (event) => {
            const file = event.target.files[0];
            previewFile(file);
        });
    </script>

@stop
