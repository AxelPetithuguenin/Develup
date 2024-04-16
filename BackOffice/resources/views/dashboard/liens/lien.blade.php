@extends('template')

@section('content')

    <!-- // LIEN CREATION D'UN PARTENAIRE // -->
    <form action="{{ route('liens.create')}}" method="get">
        @csrf
        <button type="submit" class="header-button-dashboard btn green-btn text">Créer un nouveau réseau social</button>
    </form>

    <!-- // SEARCH BAR // -->
    <div class="search-bar">
        <div class="search-bar-content">
            <input class="text input-search-box" type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher" title="Rechercher">
            <i class="ri-search-line search-icone text"></i>
        </div>
    </div>

    <!-- // LSITES DES RESEAUX SOCIAUX // -->
    <table class="dashboard-table" id="dashbaord-table"> 
        <thead class="dashboad-thread text">
            <tr>
                <th>
                    <button class="btn btn-link" data-sort="nom">Nom du réseau social<i class="ri-expand-up-down-fill"></i></button>
                </th>
                <th>
                    Icone
                </th>

                <th>
                    Modifier
                </th>

                <th>
                    Supprimer
                </th>

            </tr>
        </thead>
        <tbody class="dashboad-tbody text">

            @foreach($liens as $lien)
                <tr>
                    <td>{{ $lien->nom }}</td>

                    <td class="image-icone">{!! file_get_contents(public_path('storage/icone/' . $lien->icone)) !!}</td>
                    <!-- file_get_contents = pour lire le contenue SVG -->

                    <td>
                        <form action="{{ route('liens.edit', [$lien->id]) }}" method="get">
                            @csrf
                            <button type="submit" class="edit-btn text">Modifier<i class="ri-pencil-fill"></i></button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('liens.destroy', [$lien->id]) }}" method="POST" id="deleteForm{{$lien->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-btn text" onclick="confirmDelete('{{ $lien->id }}', '{{ $lien->nom }}')">Supprimer <i class="ri-delete-bin-line"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>

    <!-- // PAGINATION // -->
    <div class="pagination">
        <div class="pagination-container">
            @if ($liens->onFirstPage())
                <div class="pagination-btn pagination-icon-btn text disabled">
                    <i class="ri-arrow-left-s-line"></i>
                </div>
            @else
                <a href="{{ $liens->previousPageUrl() }}">
                    <div class="pagination-btn pagination-icon-btn text">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>
                </a>
            @endif
            @foreach ($liens->getUrlRange(1, $liens->lastPage()) as $page => $url)
                <div class="pagination-btn">
                    <a href="{{ $url }}" class="pagination-number-btn text dg {{ $liens->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                </div>
            @endforeach
            @if ($liens->hasMorePages())
                <div class="pagination-btn pagination-icon-btn text">
                    <a href="{{ $liens->nextPageUrl() }}">
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>
            @else
                <a href="{{ $liens->nextPageUrl() }}">
                    <div class="pagination-btn pagination-icon-btn text">
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </a>
            @endif
        </div>
    </div>

    <style>
        .disabled{
            background-color: var(--primary-color);
            color: var(--white-color) !important;
        }
    </style>

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
        function confirmDelete(id, nom) {
            $('#confirmDeleteModal').modal('show');
            $('#modalBodyText').text(`Êtes-vous sûr de vouloir supprimer ${nom} ?`);

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

