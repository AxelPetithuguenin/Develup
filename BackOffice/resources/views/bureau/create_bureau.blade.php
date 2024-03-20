<form action="{{ route('store') }}" method="post">
        @csrf
        Nom : <input type="text" name="nom" />
        @error ('nom')
            {{$message}}
            @enderror
        Prénom : <input type="text" name="prenom" />
        @error ('prenom')
            {{$message}}
        Fonction : <input type="text" name="libelle">
            @enderror
        <input type="submit" value="Créer" />
    </form>