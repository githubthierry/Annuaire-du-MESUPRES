@extends('partials._content',['titre' => 'Modifier une direction'])

@section('contenu')
    <div class="mx-auto col-md-6 mt-5 shadow p-4 bg-white rounded">
        <h1 class="text-muted text-center">Modifier une direction</h1>
        <hr>
        <form action="{{ route('directions.chargement',['direction' => $direction->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            @include('Directions._form',['submitButtonText' => 'Modifier'])
        </form>
    </div>
@endsection
