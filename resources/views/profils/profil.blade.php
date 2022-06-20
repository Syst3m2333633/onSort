@extends('Layouts.layout')

@section('content')

    <h3>Mon Profil</h3>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <form method="POST">
        @csrf

        <p style="display:none">{{ $campuses = App\Models\Campus::all() }}</p>
        <p style="display:none">{{--{{ $user = App\Models\User::all() }}--}}</p>

        <label for="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" id="pseudo" placeholder="{{ auth()->user()->name }}" /><br>
        <label for="firstname">Prenom : </label>
        <input type="text" name="firstname" id="firstname" placeholder="{{ auth()->user()->firstname }}" /><br>
        <label for="name">Nom : </label>
        <input type="text" name="name" id="name" placeholder="{{ auth()->user()->name }}" /><br>
        <label for="phone">Telephone : </label>
        <input type="text" name="phone" id="phone" placeholder="{{ auth()->user()->phone }}" /><br>
        <label for="email">Email : </label>
        <input type="text" name="email" id="email" placeholder="{{ auth()->user()->email }}" /><br>
        <label for="password">Mot de passe : </label>
        <input type="password" name="password" id="password" placeholder="password" /><br>
        <label for="password_confirmation">Confirmation du mot de passe : </label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{ auth()->user()->password_confirmation }}" /><br>
        <label for="campus">Campus : </label>
        <select name="campus" id="campus">
            @foreach($campuses as $campus)
                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
            @endforeach
        </select><br>
        <label for="photo">Photo : </label>
        <input type="file" name="photo" id="photo" placeholder="{{ auth()->user()->photo }}" /><br>

        <button type="submit" class="btn-btn-primary">Enregistrer</button>
        <button type="reset">Annuler</button>

    </form>
@endsection
