@extends('template')

@section('content')

    <!-- // FORMULAIRE MODIFICATION D'UN LIEN // -->
    <h3>Modifier un lien</h3>

    <form action="{{ route('liens.update', [$liens->id]) }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom" class="text label-dashboard">Nom :</label>
                <input type="text" name="nom" id="nom" value="{{ isset($liens) ? $liens->nom : '' }}" class="input-box text"/>
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="icone" class="text label-dashboard">Icone :</label>
                <input type="file" name="icone" id="icone" class="input-box text"/>
                @error('icone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Modifier</button>
            </div>

        </div>
    </form>

@stop
