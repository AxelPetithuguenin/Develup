@extends('template')

@section('content')

    <!-- // FORMULAIRE CREATION D'UN LIENS // -->
    <form action="{{ route('liens.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- // LSITES DES LIENS // -->
        <h3>Créer un nouveau réseau social</h3>

        <!-- // LABEL NOM DU RESEAU SOCIAL // -->
        <div class="form-group">
            <label for="nom">Nom du réseau social</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}"/>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <p>
            Afin d'avoir une meilleure expérience, nous vous recommandons de vous rendre sur ce site 
            <a href="https://remixicon.com/">Remixicon</a>
            de choisir votre îcone et de le télécharger en "SVG".
        </p>

        <!-- // ICON DU RESEAUX SOCIAUX // -->
        <div class="form-group">
            <label for="icone">Icône du resau social</label>
            <input type="file" name="icone" id="icone"/>
            @error('icone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <br>
        <br>
        <br>

        <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
        <button type="submit" class="btn btn-success">Créer ce réseau social</button>
    </form>

@stop
