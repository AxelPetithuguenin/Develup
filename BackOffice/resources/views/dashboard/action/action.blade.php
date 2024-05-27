@extends('template')
@section('content')

<h1>Action</h1>

<!-- // LIEN CREATION D'UNE ACTUALITE // -->
<form action="{{ route('actions.create')}}" method="get">
    @csrf
    <button type="submit" class="header-button-dashboard btn green-btn text">Ajouter une nouvelle action</button>
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
                <th>Heure</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Nombre d'inscrits</th>
                <th>Privée</th>
                <th>Nombre de Sensibilisés</th>
                <th>Galerie Photo</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody class="dashboard-tbody text">

        @foreach($actions as $action)
            <tr>
                <td>{{ $action['titre_action'] }} </td>
                <td>
                    {{ $action['date_action']}}
                </td>
                <td>
                    {{ $action['heure_action']}}
                </td>
                <td>
                    {{ $action['adresse']}}
                </td>
                <td>
                    {{ $action['code_postal']}}
                </td>
                <td>
                    {{ $action['ville']}}
                </td>
                <td>
                    {{ $action['nb_inscrits']}}
                </td>
                <td>
                    @if ( $action['is_private'] == 0)
                    <p> Non <p>
                    @else 
                    <p> Oui <p>
                    @endif      
                </td>
                <td>
                    {{ $action['nb_sensibilises']}}
                </td>
                <td><form action="{{ route('photos.index') }}" method="get">
                        @csrf
                    <button type="submit" class="header-button-dashboard btn green-btn text">Acceder à la galerie photo</button>
                </form>
                </td>
                <td>
                <form action="{{ route('actions.edit', [$action['id']])}}" method="get">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="edit-btn text">Modifier<i class="ri-pencil-fill"></i></button>
                    </form> 
                </td>
                <td>
                <form action="{{ route('actions.destroy', [$action['id']]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn text">Supprimer<i class="ri-delete-bin-line"></i></button>
                  
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection