@extends('Layouts.layout')

@section('content')
    <h3>Créer une sortie</h3>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <form method="POST">
        @csrf

        <p style="display:none">{{ $sortie = App\Models\Sortie::all() }}</p>
        <p style="display:none">{{ $campuses = App\Models\Campus::all() }}</p>
        <p style="display:none">{{ $villes = App\Models\Ville::all() }}</p>
        <p style="display:none">{{ $lieus = App\Models\Lieu::all() }}</p>



        <label for="name">Nom de la sortie : </label>
        <input type="text" name="name" id="name" placeholder="Nom de la sortie" /><br>
        <label for="dateHeureDebut">Date de la sortie : </label>
        <input type="date" name="dateHeureDebut" id="dateHeureDebut" placeholder="Date de la sortie" /><br>
        <label for="dateLimiteInscription">Date limite d'inscription : </label>
        <input type="date" name="dateLimiteInscription" id="dateLimiteInscription"
            placeholder="Date limite d'inscription" /><br>
        <label for="nbInscriptionMax">Nombre de places : </label>
        <input type="number" name="nbInscriptionMax" id="nbInscriptionMax" placeholder="Nombre de places" /><br>
        <label for="duree">Durée : </label>
        <input type="number" name="duree" id="duree" placeholder="Durée" /><br>
        <label for="infoSortie">Description et infos :</label>
        <textarea name="infoSortie" id="infoSortie" placeholder="Description"></textarea><br>
        <label for="campus">Campus : </label>
        <select name="campus" id="campus">
            @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
            @endforeach
        </select><br>
        <label for="ville">Ville : </label>
        <select name="ville" id="ville">
            @foreach ($villes as $ville)
                <option value="{{ $ville->id }}">{{ $ville->name }}</option>
            @endforeach
        </select><br>
        <label for="rue">Rue : </label>
        <input type="text" name="rue" id="rue" placeholder="Rue" /><br>
        <label for="codePostal">Code postal : </label>
        <input type="number" name="codePostal" id="codePostal" placeholder="Code postal" /><br>
        <label for="latitude">Latitude : </label>
        <input type="number" name="latitude" id="latitude" placeholder="Latitude" /><br>
        <label for="longitude">Longitude : </label>
        <input type="number" name="longitude" id="longitude" placeholder="Longitude" /><br>
        <label for="photo">photo : </label>
        <input type="file" name="photo" id="photo" placeholder="photo" /><br>

        <button type="submit" class="btn-btn-primary">Publier la sortie</button>
        <button type="reset">Annuler</button>
    </form>

@endsection
