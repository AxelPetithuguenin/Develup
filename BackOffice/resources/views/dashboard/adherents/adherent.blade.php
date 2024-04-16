@extends('template')

@section('content')

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
                    <button class="btn btn-link" data-sort="nom">Nom<i class="ri-expand-up-down-fill"></i></button>
                </th>

                <th>
                    <button class="btn btn-link" data-sort="nom">Prénom<i class="ri-expand-up-down-fill"></i></button>
                </th>

                <th>
                    <button class="btn btn-link" data-sort="nom">E-mail<i class="ri-expand-up-down-fill"></i></button>
                </th>

                <th>
                    Modifier
                </th>

            </tr>
        </thead>
        <tbody class="dashboad-tbody text">

            @foreach($adherents as $adherent)
                <tr>
                    <td>{{ $adherent->nom }}</td>

                    <td>{{ $adherent->prenom }}</td>

                    <td>{{ $adherent->email }}</td>

                    <td>
                        <form action="{{ route('adherent.destroy', [$adherent->id]) }}" method="POST" id="deleteForm{{$adherent->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-btn text" onclick="confirmDelete('{{ $adherent->id }}', '{{ $adherent->nom }}')">Supprimer <i class="ri-delete-bin-line"></i></button>
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

    <!-- // PAGINATION // -->
    <div class="pagination">
        <div class="pagination-container">
            @if ($adherents->onFirstPage())
                <div class="pagination-btn pagination-icon-btn text disabled">
                    <i class="ri-arrow-left-s-line"></i>
                </div>
            @else
                <a href="{{ $adherents->previousPageUrl() }}">
                    <div class="pagination-btn pagination-icon-btn text">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>
                </a>
            @endif
            @foreach ($adherents->getUrlRange(1, $adherents->lastPage()) as $page => $url)
                <div class="pagination-btn">
                    <a href="{{ $url }}" class="pagination-number-btn text dg {{ $adherents->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                </div>
            @endforeach
            @if ($adherents->hasMorePages())
                <div class="pagination-btn pagination-icon-btn text">
                    <a href="{{ $adherents->nextPageUrl() }}">
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>
            @else
                <a href="{{ $adherents->nextPageUrl() }}">
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
            $('#modalBodyText').text(`Êtes-vous sûr de vouloir supprimer l'adhérent "${nom}" ?`);

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