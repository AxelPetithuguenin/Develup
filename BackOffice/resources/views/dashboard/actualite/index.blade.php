@extends('template')
@section('content')
<h1>Partenaires</h1>
<a href="{{ route('actualites.create')}}" class="btn btn-primary">Ajouter un nouveau partenaire</a>
 
<div class="table-responsive">
    <table class="table table-bordered table-hover table-sm" id="myTable">
        <thead>
            <tr>
                <th>
                    Titre
                </th>
                <th>
                    Date
                </th>
                <th>
                    image
                </th>
                <th>
                    contenu
                </th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody class="table-body">
            <tr>
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
                    <a href="{{ route('actualites.edit', [$actualite['id']])}}" class="btn btn-primary">Modifier</a>
                </td>
 
                <td>
                    <form action="{{ route('actualites.destroy', [$actualite['id']]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection