@extends('template')

@section('content')

    <!-- // LIEN CREATION D'UN BUREAU // -->
    <form action="{{ route('bureau.create')}}" method="get">
        @csrf
        <button type="submit" class="header-button-dashboard btn green-btn text">Créer un bureau</button>
    </form>

    <!-- // SEARCH BAR // -->
    <div class="search-bar">
        <div class="search-bar-content">
            <input class="text input-search-box" type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher" title="Rechercher">
            <i class="ri-search-line search-icone text"></i>
        </div>
    </div>

    <!-- // LISTE DES BUREAUX // -->
    <table class="dashboard-table" id="dashbaord-table"> 
        <thead class="dashboard-thread text">
            <tr>
            <th>
                    <button class="btn btn-link text" data-sort="name">Nom <i class="ri-expand-up-down-fill"></i></button>
                </th>
                <th>
                    <button class="btn btn-link text" data-sort="name">Prenom <i class="ri-expand-up-down-fill"></i></button>
                </th>
                <th>Role</th>
                <th>Photo</th>
                <th>Modifier</th>
                <th>Supprimer</th>

            </tr>
        </thead>
        <tbody class="dashboard-tbody text">
            
        @foreach($bureaux as $bureau)
        <tr>

           
            <td>{{ $bureau["nom"] }}</td>
            <td>{{ $bureau["prenom"] }}</td>
            <td>  
                @foreach($bureau->fonctions as $fonction)
                    {{ $fonction->role }}
                @endforeach
            </td>  
            <td>
                <img class="dashboard-image" src="{{ asset('BackOffice/public/storage/pdp/' . $bureau->photo) }}" alt="{{ $bureau->nom }}">
            </td>
            
            <td>
                <form action="{{ route('bureau.edit', [$bureau->id]) }}" method="get">
                @csrf
                <button type="submit" class="edit-btn text">Modifier<i class="ri-pencil-fill"></i></button>
                </form>
            </td>
            <td>
                <form action="{{ route('bureau.destroy', [$bureau->id]) }}" method="POST" id="deleteForm{{$bureau->id}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn text">Supprimer <i class="ri-delete-bin-line"></i></button>
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
@stop