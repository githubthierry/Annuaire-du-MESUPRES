@extends('partials._content',['titre' => 'Modifier une poste'])

@section('contenu')
    <div class="mx-auto col-md-6 mt-5 shadow p-4 bg-white rounded">
        <h1 class="text-muted text-center">Modifier une poste</h1>
        <hr>
        <form action="{{ route('postes.changement',$poste) }}" method="POST">
            @csrf
            @method('PATCH')

            @include('Postes._form',['submitButtonText' => 'Modifier'])

        </form>
    </div>
@endsection
