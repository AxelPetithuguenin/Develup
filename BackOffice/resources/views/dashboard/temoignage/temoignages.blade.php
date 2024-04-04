@extends('template')

@section('content')

    <!-- // LIEN CREATION D'UN TEMOIGNAGE // -->
    <form action="{{ route('temoignage.create')}}" method="get">
        @csrf
        <button type="submit" class="header-button-dashboard btn green-btn text">Créer un témoignage</button>
    </form>

    <!-- // SEARCH BAR // -->
    <div class="search-bar">
        <div class="search-bar-content">
            <input class="text input-search-box" type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher" title="Rechercher">
            <i class="ri-search-line search-icone text"></i>
        </div>
    </div>

    <!-- // LISTE DES PARTENAIRES // -->
    <table class="dashboard-table" id="dashbaord-table"> 
        <thead class="dashboard-thread text">
            <tr>
                <th>
                    <button class="btn btn-link text" data-sort="name">Titre<i class="ri-expand-up-down-fill"></i></button>
                </th>
                <th>
                    <button class="btn btn-link text" data-sort="name">Prénom<i class="ri-expand-up-down-fill"></i></button>
                </th>
                <th>Image</th>
                <th>Date</th>
                <th>Contenue</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody class="dashboard-tbody text">
            @foreach($temoignages as $temoignage)
                <tr>
                    <td>
                        {{ $temoignage->titre_temoignage }}
                    </td>
                    <td>
                        {{ $temoignage->prenom_temoignage }}
                    </td>
                    <td>
                        <img src="{{ asset('BackOffice/public/storage/image_temoignage/' . $temoignage->image_temoignage) }}" alt="Image du témoignage" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($temoignage->date_temoignage)->formatLocalized('%d %B %Y') }}
                    </td>
                    <td>
                        {{ implode(' ', array_slice(explode(' ', $temoignage->contenu_temoignage), 0, 5)) }}{{ str_word_count($temoignage->contenu_temoignage) > 5 ? '...' : '' }}
                    </td>
                    <td>
                        <form action="{{ route('temoignage.edit', [$temoignage->id]) }}" method="get">
                            @csrf
                            <button type="submit" class="edit-btn text">Modifier<i class="ri-pencil-fill"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('temoignage.destroy', [$temoignage->id]) }}" method="POST" id="deleteForm{{$temoignage->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-btn text" onclick="confirmDelete('{{ $temoignage->id }}', '{{ $temoignage->titre_temoignage }}')">Supprimer <i class="ri-delete-bin-line"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- // MODALE DE CONFIRMATION DE SUPPRESSIONS // -->
    <div class="modal" id="confirmDeleteModal" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text" style="font-weight: 600;" id="confirmDeleteModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="text" data-dismiss="modal" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="modal-container">
                    <p id="modalBodyText" class="text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="edit-btn text" data-dismiss="modal">Annuler</button>
                    <button type="button" class="delete-btn text" id="confirmDeleteButton">Supprimer<i class="ri-delete-bin-line"></i></button>
                </div>
            </div>
        </div>
    </div>
    
<style>
.modal {
    position: fixed;
    display: none;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: var(--background-filer);
    z-index: 10;
    overflow: auto;
}
.modal-dialog {
    position: relative;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    margin: auto;
    max-width: 500px;
    padding: 20px;
    background-color: var(--white-color);
    border-radius: 15px;
    box-shadow: 0px 0px 10px var(--primary-color); 
}
.modal-header{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal-header button{
    position: absolute;
    top: 5px;
    right: 1rem;
    color: var(--primary-color);
    border: none;
    background-color: var(--white-color);
    cursor: pointer;
}
.modal-container{
    padding: 20px 0;
}
.modal-footer{
    margin: 15px 0;
    display: flex;
    justify-content: center;
}
.modal-footer button{
    margin: 0 5px;
}
</style>

    <!-- // SCRIPT // -->
    <script>
        function confirmDelete(id, titre) {
            $('#confirmDeleteModal').modal('show');
            $('#modalBodyText').text(`Êtes-vous sûr de vouloir supprimer le témoignage "${titre}" ?`);

            // Si l'utilisateur clique sur "Supprimer", soumettez le formulaire de suppression
            $('#confirmDeleteButton').click(function() {
                $('#deleteForm' + id).submit();
            });
        }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@stop
