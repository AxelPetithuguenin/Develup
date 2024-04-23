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
                <th>
                    Modifier
                </th>
                <th>
                    Supprimer
                </th>
                

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
                            <button type="submit" class="delete-btn text">Supprimer<i class="ri-delete-bin-line"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@stop