@extends('partials._content',['titre' => 'Modifier une service'])

@section('contenu')
    @include('partials.message.alert')
    <div class="mx-auto col-md-6 mt-5 shadow p-4 bg-white rounded">
        <h1 class="text-muted text-center">Modifier une service</h1>
        <hr>
        <form action="{{ route('services.chargement',['service' => $service->id ]) }}" method="POST">
            @csrf
            @method('PATCH')

            @include('Services._form',['submitButtonText' => 'modifier'])

        </form>
    </div>
@endsection
