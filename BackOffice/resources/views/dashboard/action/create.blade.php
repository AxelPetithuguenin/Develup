@extends('template')
@section('content')

<!-- // FORMULAIRE CREATION D'UNE ACTION // -->
<form action="{{ route('actions.store') }}" method="post" enctype="multipart/form-data" class="formulaire-dashboard">
    <div class="formulaire-dashboard-container">
        @csrf

    <!-- // HEADER DASHBOARD // -->
    <div class="header-form-container">
        <h3 class="mgb-15">Créer une nouvelle action</h3>
        <hr class="dashboard-hr">
    </div>
    
    <!-- // NOM ACTION // -->
    <div class="form-group">
        <label for="titre_action" class="text label-dashboard">Titre</label>
        <input type="text" class="input-box text" name="titre_action" id="titre_action" class="form-control"/>
        

    </div>

    <!-- // DATE ACTION // -->
    <div class="form-group">
        <label for="date_action" class="text label-dashboard">Date</label>
        <input type="date" class="input-box text" name="date_action" id="date_action" class="form-control"/>
       

    </div>

    <!-- // HEURE ACTION // -->
    <div class="form-group">
        <label for="heure_action" class="text label-dashboard">Heure</label>
        <input type="time" class="input-box text" name="heure_action" id="heure_action" class="form-control"/>
       
    </div>

    <!-- // ADRESSE DE L'ACTION // -->
    <div class="form-group">
        <label for="adresse_action" class="text label-dashboard">Adresse</label>
        <input type="text" class="input-box text" name="adresse_action" id="adresse_action" class="form-control"/>
       
    </div>
   
    <!-- // CODE POSTAL DE L'ACTION // -->
    <div class="form-group">
        <label for="code_postal_action" class="text label-dashboard">Code postal</label>
        <input type="text" class="input-box text" name="code_postal_action" id="code_postal_action" class="form-control"/>
       
    </div>

    <!-- // VILLE DE L'ACTION // -->
    <div class="form-group">
        <label for="ville_action" class="text label-dashboard">Ville</label>
        <input type="text" class="input-box text" name="ville_action" id="ville_action" class="form-control"/>
       
    </div>

    <!-- // NOMBRE D'INSCRIT A UNE ACTION // -->
    <div class="form-group">
        <label for="nb_inscrits_action" class="text label-dashboard">Nombre D'inscrits</label>
        <input type="text" class="input-box text" name="nb_inscrits_action" id="nb_inscrits_action" class="form-control"/>
       
    </div>

    <!-- // ACTION PRIVEE OU NON // -->
    <div class="form-group">
    <label for="is_private_action" class="text label-dashboard">Accessible par les tous le monde </label>
        
    <div>
        <input type="radio" class="text" name="is_private_action" id="is_private_action" value="1" class="form-control" />
        <label for="is_private_action" class="text label-dashboard">Oui</label>
    </div>
    <div>
        <input type="radio" class="text" name="is_private_action" id="is_private_action" value="0" class="form-control"/>
        <label for="is_private_action" class="text label-dashboard">Non</label>
    </div>
    </div>

    <!-- // NOMBRE SENSIBILISE ACTION  // -->
    <div class="form-group">
        <label for="nb_sensibilises_action" class="text label-dashboard">Nombre de Sensibilisés</label>
        <input type="text" class="input-box text" name="nb_sensibilises_action" id="nb_sensibilises_action" class="form-control"/>

    </div>
    

    <div style="margin: 25px 0 25px 0;">
        <button type="submit" class="btn btn-primary ">Ajouter</button>
        </div>
    </div>
</form>


@endsection