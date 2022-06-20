@extends('layouts.layout')

@section('content')

<h3>Afficher une sortie</h3>

{{-- @foreach ($sorties as $sortie)
@endforeach --}}
{{-- @dd($sortie) --}}

<label for="name">Nom de la sortie : </label>
<p>{{ $sortie->name }}</p>
<label for="dateHeureDebut">Date et heure de la sortie : </label>
<p>{{ $sortie->dateHeureDebut }}</p>
<label for="dateLimiteInscription">Date limite d'inscription : </label>
<p>{{ $sortie->dateLimiteInscription }}</p>
<label for="nbInscriptionMax">Nombre de places : </label>
<p>{{ $sortie->nbInscriptionMax }}</p>
<label for="duree">Durée : </label>
<p>{{ $sortie->duree }}</p>
<label for="infoSortie">Description et infos : </label>
<p>{{ $sortie->infoSortie }}</p>
<label for="campus">Campus : </label>
<p>{{ $sortie->campus->name }}</p>
<label for="lieu">Lieu : </label>
<p>{{ $sortie->lieu->name }}</p>
<label for="codePostal">Code postal : </label>
<p>{{ $sortie->lieu->ville->name }}</p>
<label for="latitude">Latitude : </label>
<p>{{ $sortie->lieu->latitude }}</p>
<label for="longitude">Longitude : </label>
<p>{{ $sortie->lieu->longitude }}</p>
@endsection
