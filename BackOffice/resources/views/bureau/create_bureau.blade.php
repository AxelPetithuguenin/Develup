<h2> Bureau - création</h2><br>
<form action="{{ route('store') }}" method="post"enctype="multipart/form-data">
        
        <label>
        Nom : <input type="text" name="nom" />
        </label><br/><br/>
        
            <label>
        Prénom : <input type="text" name="prenom" />
        </label><br/><br/>
    
        <label>
        Fonction : <input type="text" name="libelle">
        </label><br><br>
            
        <input type="submit" value="Créer" />
    </form>