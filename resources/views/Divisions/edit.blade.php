@extends('partials._content',['titre' => 'Modifier un division'])

@section('contenu')
<div class="row" style="margin:auto;">
    @include('partials.message.alert')
    <div class="mx-auto col-md-6 mt-5 shadow p-4 bg-white rounded">
        <h1 class="text-muted text-center">Modifier une division</h1>
        <hr>
        <form action="{{ route('divisions.changement',$division->id) }}" method="POST">
            @csrf
            @method('PATCH')

            @include('Divisions._form',['submitButtonText' => 'modifier'])

        </form>
    </div>
@endsection
