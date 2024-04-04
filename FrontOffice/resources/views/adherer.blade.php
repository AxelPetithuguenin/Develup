@extends('template')

@section('content')

    <!-- // ADHERENT PAGE // -->
    <section class="container-page">
        
        <!-- // MESSAGE SUCCES // -->
        @if(session('success'))
            <div class="message-succes-dashboard">
                <div class="message-succes-container">
                    <div class="text">
                        <i class="ri-bard-line lg"></i>
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        
        <!-- // FORMULAIRE ADHERENT // -->
        <form action="{{ route('adherer-store') }}" method="post">
        @csrf

            <!-- // LABEL NOM  // -->
            <div class="form-group">
                <label for="nom" class="text label-dashboard">Nom</label>
                <input type="text" class="input-box text" name="nom" id="nom" value="{{ old('nom') }}"/>
                @error('nom')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LABEL PRENOM  // -->
            <div class="form-group">
                <label for="prenom" class="text label-dashboard">Prénom</label>
                <input type="text" class="input-box text" name="prenom" id="prenom" value="{{ old('prenom') }}"/>
                @error('prenom')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LABEL EMAIL  // -->
            <div class="form-group">
                <label for="email" class="text label-dashboard">E-mail</label>
                <input type="email" class="input-box text" name="email" id="email" value="{{ old('email') }}"/>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 25px 0 25px 0;">
                <button type="submit" class="btn green-btn text">Adhérer</button>
            </div>

        </form>
    </section>
@stop
