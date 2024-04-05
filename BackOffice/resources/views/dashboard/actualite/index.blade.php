@extends('template')
@section('content')

<h1>Actualité</h1>

<!-- // LIEN CREATION D'UNE ACTUALITE // -->
<form action="{{ route('actualites.create')}}" method="get">
    @csrf
    <button type="submit" class="header-button-dashboard btn green-btn text">Ajouter une nouvelle actualité</button>
</form>

<!-- // SEARCH BAR // -->
<div class="search-bar">
        <div class="search-bar-content">
            <input class="text input-search-box" type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher" title="Rechercher">
            <i class="ri-search-line search-icone text"></i>
        </div>
    </div>

     <!-- // ACTUALITE // -->
    <table class="dashboard-table" id="dashbaord-table"> 
        <thead class="dashboard-thread text">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Image</th>
                <th>Contenu</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody class="dashboard-tbody text">
            
        @foreach($actualites as $actualite)
            <tr>
                <td>{{ $actualite['titre_actualite'] }} </td>
                <td>
                    {{ $actualite['_date_actualite']}}
                </td>
                <td>
                    <img src="storage/{{ $actualite['image'] }}" alt="{{ $actualite['image'] }}"
                    height="25%" width="25%"/>         
                </td>
                <td>
                    {{ $actualite['contenu_actualite']}}
                </td>
                <td>
                    <form action="{{ route('actualites.edit', [$actualite['id']])}}" method="get">
                        @csrf
                        <button type="submit" class="edit-btn text">Modifier<i class="ri-pencil-fill"></i></button>
                    </form>
                </td>
 
                <td>
                    <form action="{{ route('actualites.destroy', [$actualite['id']]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn text">Supprimer <i class="ri-delete-bin-line"></i></button>
                    </form>
 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection