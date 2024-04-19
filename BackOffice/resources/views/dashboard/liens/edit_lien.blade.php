@extends('template')

@section('content')

    <!-- // FORMULAIRE MODIFICATION D'UN LIEN // -->
    <h3>Modifier un lien</h3>

    <form action="{{ route('liens.update', [$liens->id]) }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf
            @method('PUT')

            <!-- // LABEL NOM DU RESEAU SOCIAL // -->
            <div class="form-group">
                <label for="nom" class="text label-dashboard">Nom :</label>
                <input type="text" name="nom" id="nom" value="{{ isset($liens) ? $liens->nom : '' }}" class="input-box text"/>
                @error('nom')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // ICON DU RESEAUX SOCIAUX // -->
            <div class="form-group" id="drop-zone">
                <label for="icone" class="text label-dashboard" style="text-align: center;">Glisser-déposer une image du témoignage</label>
                <input type="file" class="input-box text" name="icone" id="icone" style="display: none;">
                <div id="image-temoignage-preview-container">
                    @if ($liens->icone)
                        <img id="image-temoignage-preview" src="{{ asset('BackOffice/public/storage/icone/' . $liens->icone) }}" alt="Preview" style="max-width: 100%; max-height: 100px;">
                    @else
                        <p class="text">Aucune image sélectionnée</p>
                    @endif
                </div>
                <p class="text">ou</p>
                <p class="text">cliquez ici pour sélectionner une nouvelle image</p>
                @error('icone')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

        
            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Modifier</button>
            </div>

        </div>
    </form>


    <!-- // SCRIPT //  -->
    <!-- // GLISSER IMAGE //  -->
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
                const imageTemoignagePreview = document.getElementById('image-temoignage-preview');
                imageTemoignagePreview.src = reader.result;
                document.getElementById('image-temoignage-preview-container').style.display = 'block';
            };
        }

        input.addEventListener('change', (event) => {
            const file = event.target.files[0];
            previewFile(file);
        });
    </script>

@stop
