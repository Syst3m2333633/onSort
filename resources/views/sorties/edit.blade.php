@extends('layouts.layout')

@section('content')

<h3>Afficher une sortie</h3>

<form method="POST" action="{{ route('sortie.update', ['sortie' => $sortie->id]) }}">
    @csrf
    @method('PUT')

<label for="name">Nom de la sortie : </label>
<input tpe="text" name="name" id="name" placeholder="{{ $sortie->name }}"/><br>
<label for="dateHeureDebut">Date et heure de la sortie : </label>
<input type="date" name="dateHeureDebut" id="dateHeureDebut" value="{{ \Carbon\Carbon::parse($sortie->dateHeureDebut)->format('Y-m-d') }}"/><br>
<label for="dateLimiteInscription">Date limite d'inscription : </label>
<input type="date" name="dateLimiteInscription" id="dateLimiteInscription" value="{{ \Carbon\Carbon::parse($sortie->dateLimiteInscription)->format('Y-m-d') }}"/><br>
<label for="nbInscriptionMax">Nombre de places : </label>
<input type="number" name="nbInscriptionMax" id="nbInscriptionMax" placeholder="{{ $sortie->nbInscriptionMax }}"/><br>
<label for="duree">Durée : </label>
<input type="number" name="duree" id="duree" placeholder="{{ $sortie->duree }}"/><br>
<label for="infoSortie">Description et infos : </label>
<input type="text" name="infoSortie" id="infoSortie" placeholder="{{ $sortie->infoSortie }}"/><br>
<label for="campus">Campus : </label>
<select>
    @foreach ($campuses as $campus)
        <option value="{{ $campus->id }}">{{ $campus->name }}</option>
    @endforeach
</select><br>
<label for="lieu">Lieu : </label>
<select>
    @foreach ($lieux as $lieu)
        <option value="{{ $lieu->id }}">{{ $lieu->name }}</option>
    @endforeach
</select><br>
<label for="codePostal">Code postal : </label>
        <input type="text" name="codePostal" id="codePostal" placeholder="{{ $sortie->lieu->ville->codePostal }}"/><br>
<label for="latitude">Latitude : </label>
<input type="text" name="latitude" id="latitude" placeholder="{{ $sortie->lieu->latitude }}"/><br>
<label for="longitude">Longitude : </label>
<input type="text" name="longitude" id="longitude" placeholder="{{ $sortie->lieu->longitude }}"/><br>
<input type="submit" value="Enregistrer">
</form>

<a href="{{ route('sortie.store', $sortie->id) }}">Publier la sortie</a>
<form action="{{ route('sortie.destroy', $sortie->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Supprimer la sortie"/>
    {{-- <button type="submit">Supprimer</button> --}}
</form>
{{-- <a href="{{ route('sortie.destroy', $sortie->id) }}">Supprimer la sortie</a> --}}
<a href="{{ route('dashboard') }}">Annuler</a>

@endsection
