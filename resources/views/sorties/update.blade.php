@extends('layouts.layout')

@section('content')

<h3> Modifier une sortie</h3>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    {{-- <form method="POST">
        @csrf
        @method('POST')
    </form> --}}
