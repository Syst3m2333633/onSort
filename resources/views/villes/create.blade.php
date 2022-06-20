@extends('Layouts.layout')

@section('content')

    <h3>Gérer les villes</h3>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <p style="display:none">{{ $villes = App\Models\Ville::all() }}</p>



    <h5>Filtrer les villes</h5>

    <label for="search">Le nom contient : </label>
    <input type="search" name="search" id="search" placeholder="Rechercher un campus" /><br>

    <button type="search" class="btn btn-primary">Rechercher</button>

    <table>
        <thead>
            <tr>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($villes as $ville)
                <tr>
                    <td>{{ $ville->name }}</td>
                    <td>{{ $ville->codePostal }}</td>
                    <td>
                        <form method="POST" action="{{ $ville->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <form method="POST" action="{{ $ville->id }}/edit">
                            @csrf
                            @method('UPDATE')
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <form method="POST">
                @csrf
                @method('POST')
                <tr>
                    <td>
                        <input type="text" name="name" placeholder="Nom de la ville" />
                    </td>
                    <td>
                        <input type="text" name="codePostal" placeholder="Code postal" />
                    </td>
                    <td>
                        <button type="submit" class="btn-btn-primary" data-toggle="modal"
                            data-target="#create{{ $ville }}">Ajouter</button>
                    </td>
                <tr>
            </form>
        </tbody>
    </table>


@endsection
