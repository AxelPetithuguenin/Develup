@extends('template')

@section('content')

    <!-- // LIEN CREATION D'UN PARTENAIRE // -->
    <form action="{{ route('liens.create')}}" method="get">
        @csrf
        <button type="submit" class="header-button-dashboard btn green-btn text">Créer un nouveau réseau social</button>
    </form>

    <!-- // MESSAGE SUCCES // -->
    @if(session('success'))
        <div class="text">
            {{ session('success') }}
        </div>
    @endif

    <!-- // LSITES DES RESEAUX SOCIAUX // -->
    <table class="dashboard-table">
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
                            <button type="submit" class="delete-btn text">Supprimer <i class="ri-delete-bin-line"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@stop