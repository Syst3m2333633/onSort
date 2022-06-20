@extends('Layouts.layout')

@section('content')

    <h3>Gérer les campus</h3>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <p style="display:none">{{ $campuses = App\Models\Campus::all() }}</p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <h5>Filtrer les sites</h5>

    <label for="search">Le nom contient : </label>
    <input type="search" name="search" id="search" placeholder="Rechercher un campus" /><br>

    <button type="search" class="btn-btn-primary">Rechercher</button>

    <table>
        <thead>
            <tr>
                <th>Campus</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campuses as $campus)
                <tr>
                    <td>{{ $campus->name }}</td>
                    <td>
                        <form method="POST" action="{{ $campus->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <form method="POST" action="{{ $campus->id }}/edit">
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
                        <input type="text" name="name" placeholder="Nom du campus" />
                    </td>
                    <td>
                        <button type="submit" class="btn-btn-primary">Ajouter</button>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>

@endsection
