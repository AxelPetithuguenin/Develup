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
                    <td>{{ \Carbon\Carbon::parse($temoignage->date_temoignage)->formatLocalized('%d %B %Y') }}</td>

                    <td>
                        {{ $temoignage->contenu_temoignage }}
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
                            <button type="submit" class="delete-btn text">Supprimer <i class="ri-delete-bin-line"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
