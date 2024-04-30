@extends('template')

@section('content')

    <!-- // LIEN CREATION D'UNE FONCTION // -->
    <form action="{{ route('fonction.create')}}" method="get">
        @csrf
        <button type="submit" class="header-button-dashboard btn green-btn text">Créer d'une nouvelle fonction</button>
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
                    <button class="btn btn-link" data-sort="nom">Rôle<i class="ri-expand-up-down-fill"></i></button>
                </th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody class="dashboad-tbody text">

            @foreach($fonctions as $fonction)
                <tr>
                    <td>{{ $fonction->role}}</td>

                    <td>
                        <form action="{{ route('fonction.edit', [$fonction->id]) }}" method="get">
                            <button type="submit" class="edit-btn text">Modifier<i class="ri-pencil-fill"></i></button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('fonction.destroy', [$fonction->id]) }}" method="POST" id="deleteForm{{$fonction->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-btn text" onclick="confirmDelete('{{ $fonction->id }}', '{{ $fonction->nom }}')">Supprimer <i class="ri-delete-bin-line"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>


    <!-- // PAGINATION // -->
    <div class="pagination">
        <div class="pagination-container">
            @if ($fonctions->onFirstPage())
                <div class="pagination-btn pagination-icon-btn text disabled">
                    <i class="ri-arrow-left-s-line"></i>
                </div>
            @else
                <a href="{{ $fonctions->previousPageUrl() }}">
                    <div class="pagination-btn pagination-icon-btn text">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>
                </a>
            @endif
            @foreach ($fonctions->getUrlRange(1, $fonctions->lastPage()) as $page => $url)
                <div class="pagination-btn">
                    <a href="{{ $url }}" class="pagination-number-btn text dg {{ $fonctions->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                </div>
            @endforeach
            @if ($fonctions->hasMorePages())
                <div class="pagination-btn pagination-icon-btn text">
                    <a href="{{ $fonctions->nextPageUrl() }}">
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>
            @else
                <a href="{{ $fonctions->nextPageUrl() }}">
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
 
    
    <!-- // SCRIPT // -->
    <script>
        function confirmDelete(id, role) {
            $('#confirmDeleteModal').modal('show');
            $('#modalBodyText').text(`Êtes-vous sûr de vouloir supprimer ${role} ?`);

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

