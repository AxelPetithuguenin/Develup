@extends('template')

@section('content')

    <!-- // LIEN CREATION D'UN PARTENAIRE // -->
    <form action="{{ route('partenaires.create')}}" method="get">
        @csrf
        <button type="submit" class="header-button-dashboard btn green-btn text">Créer un partenaire</button>
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
                    <button class="btn btn-link text" data-sort="name">Nom du partenaire <i class="ri-expand-up-down-fill"></i></button>
                </th>
                <th>Logo</th>
                <th>Réseau Sociaux</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody class="dashboard-tbody text">
            
            @foreach($partenaires as $partenaire)
                <tr>
                    <td>
                        {{ $partenaire->nom_partenaire }}
                    </td>
                    <td>
                        <img class="dashboard-image" src="{{ asset('BackOffice/public/storage/logos/' . $partenaire->logo_partenaire) }}" alt="{{ $partenaire->nom_partenaire }}">
                    </td>
                    <td>
                        @foreach($partenaire->liens as $lien)
                            <a href="{{ $lien->pivot->lien }}" target="_blank">
                                <img src="{{ asset('BackOffice/public/storage/icone/' . $lien->icone) }}" alt="{{ $lien->nom }}" title="{{ $lien->nom }}" width="20" height="20">
                            </a>
                        @endforeach
                    </td>
                    <td>
                        <form action="{{ route('partenaires.edit', [$partenaire->id]) }}" method="get">
                            @csrf
                            <button type="submit" class="edit-btn text">Modifier<i class="ri-pencil-fill"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('partenaires.destroy', [$partenaire->id]) }}" method="POST" id="deleteForm{{$partenaire->id}}">
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
