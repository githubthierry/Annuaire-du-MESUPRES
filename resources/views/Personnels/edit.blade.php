@extends('partials._content',['titre' => 'Modifier une personnel'])

@section('contenu')
    <div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        @include('partials.message.alert')
        <div class="col-sm-12 chemin">
            <h4>Personnels</h4>
        </div>
    </div>

    <!-- Information -->
    <div class="card">
        <div class="card-header" style="background:#2c8682;opacity:0.8;">
            <h5 class="text-white">Modifier une personne</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('personnels.chargement',['personnel' => $personnel->id ]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @include('Personnels._form',['submitButtonText' => 'modifier'])

        </form>
        </div>
    </div>
</div>
@stop
