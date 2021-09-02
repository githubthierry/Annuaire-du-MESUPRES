@extends('partials._content',['titre' => 'Personnels'])

@section('contenu')
<div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        @include('partials.message.alert')
        <div class="col-sm-12 chemin">
            <h4>Personnels</h4>
        </div>
    </div>
    <div class="content shadow p-3 mb-4">

        <div class="entete">
                 <h4 class="text-muted">Liste des Personnes</h4>
                 <form action="{{ route('personnels.recherche') }}" class="d-flex mr-3">
                    <div class="form-group mb-0 mr-1">
                        <input type="text" name="recherche" id="recherche" value="{{ request()->recherche ?? '' }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
                 </form>

                <a type="button" class="btn btn-info" href="/personnels/export"><span class="fa fa-print"></span>&nbsp;&nbsp;Export</a>

                <a href="{{ route('personnels.create') }}" type="button" class="btn btn-success ml-2"><span class="fa fa-user-plus"></span>&nbsp;&nbsp;Créer une personne</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Photo(s)</th>
                        <th>Nom(s)</th>
                        <th>Prénom(s)</th>
                        <th>Email(s)</th>
                        <th>Fonctions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($personnels as $p)
                    <tr>
                        <td>{{  $p->id }}</td>
                        <td>
                            <img src="{{ Storage::url($p->photo_personnels) }}" class="img img-circle" style="width:40px;border-radius:3px;" alt="...">
                        </td>
                        <td>{{  $p->nom_personnels }}</td>
                        <td>{{ $p->prenom_personnels ?? '-' }}</td>
                        <td>{{ $p->email_personnels }}</td>
                        <td>{{ $p->postes_id == null ? ' - ': $p->postes->nom_postes }}</td>
                        <td>
                            <a href="{{ route('personnels.afficher',['personnel' => $p->id]) }}" class="btn btn-warning"><span class="fa fa-eye"></span></a>
                            <a href="{{ route('personnels.modifier',['personnel' => $p->id]) }}" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                            <form action="{{ route('personnels.supprimer',['personnel' => $p->id]) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="entete">
            <small>{{ $nombre_totals > 0 ? 'Il y a '.$nombre.' / '.$nombre_totals.' éléments': 'Il n\'y aucun élément' }}</small>
            {{ $personnels->links() }}
        </div>
    </div>
</div>
@stop
