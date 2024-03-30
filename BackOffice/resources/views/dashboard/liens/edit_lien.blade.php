@extends('template')

@section('content')

    <!-- // FORMULAIRE MODIFICATION D'UN LIEN // -->
    <h3>Modifier un lien</h3>

    <form action="{{ route('liens.update', [$liens->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ isset($liens) ? $liens->nom : '' }}" class="form-control"/>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <div class="form-group">
            <label for="icone">Icone :</label>
            <input type="file" name="icone" id="icone" class="form-control"/>
            @error('icone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <button type="submit" class="btn">Modifier</button>
    </form>

@stop
