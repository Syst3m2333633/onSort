@extends('Layouts.layout')

@section('content')

    <h3>Gérer les campus</h3>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <form method="POST">
        @csrf

        <h5>Filtrer les sites</h5>

        <p style="display:none">{{ $campuses = App\Models\Campus::all() }}</p>

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
                            <a href="{{ $campus->) }}">Modifier</a>
                            <a href="{{ $campus->id) }}">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
@endsection
