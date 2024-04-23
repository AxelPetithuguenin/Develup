@extends('template')

@section('content')

    <!-- // FORMULAIRE MODIFICATION D'UN LIEN // -->
    <h3>Modifier un role</h3>

    <form action="{{ route('fonction.update', [$fonctions->id]) }}" method="post" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom" class="text label-dashboard">Role :</label>
                <input type="text" name="role" id="role" value="{{ isset($fonctions) ? $fonctions->role : '' }}" class="input-box text"/>
                @error('role')
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
