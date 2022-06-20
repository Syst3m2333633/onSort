@extends('layouts.layout')

@section('content')
        <p>Date du jour: {{ date('d/m/Y') }}</p>
        <p>Il est actuellement : {{ date('H:i') }}</p>
        <p>Participant : {{ auth()->user()->name}}

            <h3>Filtrer les sorties</h3>
            <label>Campus :</label>
            <p style="display:none">{{ $campus = App\Models\Campus::all() }}</p>
            <p style="display:none">{{ $participant = App\Models\Participant::all() }}</p>
            <p style="display:none">{{ $user = App\Models\User::all() }}</p>
                <select>
                    @foreach ($campus as $campus)
                    <option>{{ $campus->name }}</option>
                    @endforeach
                </select>
            <p style="display:none"></p><br>
            <label>Le nom de la sortie contient :</label>
            <input type="search" name="search" id="search" placeholder="search"/><br>
            <label>Entre : </label><input type="date" name="dateHeureDebut" id="dateHeureDebut" placeholder="Date de la sortie"/>
            <label> Et : </label><input type="date" name="dateHeureFin" id="dateHeureFin" placeholder="Date de fin de la sortie"><br>
                {{-- @dd($sorties->first()->user->name) --}}

            <table>
                <tr>
                    <th>Nom de la sortie</th>
                    <th>Date de la sortie</th>
                    <th>Clôture</th>
                    <th>inscrits/places</th>
                    <th>Etat</th>
                    <th>Inscrit</th>
                    <th>Ogranisateur</th>
                    <th>Actions</th>
                </tr>
                @foreach ($sorties as $sortie)
                    <tr>
                        <td>{{ $sortie->name }}</td>
                        <td>{{ $sortie->dateHeureDebut }}</td>
                        <td>{{ $sortie->dateLimiteInscription }}</td>
                        <td class="text-center">{{ $sortie->nbInscriptionMax }}/{{ $sortie->nbInscriptionMax }}</td>
                        <td>{{ $sortie->etat }}</td>
                        <td>oui ou non</td>
                        <td>
                            @if ($sortie->user_id != Null)
                                {{ $sortie->user->name }}
                            @else
                                <p>Aucun organisateur</p>
                            @endif
                        <td>
                            <a href="{{ route('sortie.show', $sortie->id) }}">Afficher</a>
                            <a href="{{ route('sortie.edit', $sortie->id) }}">Modifier</a>
                            {{-- <form method="POST" action="{{ $sortie->id }}/edit">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-primary">Afficher</button>
                            </form>
                            <form method="GET" action="{{ $sortie->id }}/update">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-secondary">Modifier</button>
                            </form> --}}
                            <a href="">S'inscrire</a><a href="">Publier</a></td>
                    </tr>
                @endforeach
            </table>
            <a href="{{ route('sortie.create') }}">Créer une sortie</a>
        <footer>
            <p>Copyright © {{ date('Y') }} &middot; OnSort - Tous droits réservés <a href="about-us">About-Us</p>
        </footer>

    </div>
@endsection
