@extends('template')

@section('content')

    <!-- // FORMULAIRE CREATION D'UN LIENS // -->
    <form action="{{ route('fonction.store') }}" method="post" class="formulaire-dashboard">
        <div class="formulaire-dashboard-container">
            @csrf

            <!-- // HEADER DASHBOARD // -->
            <div class="header-form-container">
                <h3 class="mgb-15">Créer un nouveau rôle</h3>
                <hr class="dashboard-hr">
            </div>

            <!-- // LABEL NOM DU RESEAU SOCIAL // -->
            <div class="form-group">
                <label for="role" class="text label-dashboard">Nom du réseau social</label>
                <input type="text" class="input-box text" name="role" id="role" value="{{ old('role') }}"/>
                @error('role')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
           
            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Créer ce rôle</button>
            </div>

        </div>
    </form>

@stop
