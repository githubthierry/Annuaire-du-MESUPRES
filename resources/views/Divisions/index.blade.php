@extends('partials._content', ['titre' => 'Divisions'])

@section('contenu')

    @include('divisions.create')

    <div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        @include('partials.message.alert')
        <div class="col-sm-12 chemin">
            <h4>Divisions</h4>
        </div>
    </div>
    <div class="content shadow p-3 mb-4">
        <div class="entete">
            <h4 class="text-center text-muted">Liste des Divisions</h4>
            <a type="button" class="btn btn-info" href="{{ route('divisions.exportexcel') }}"><span class="fa fa-print"></span>&nbsp;&nbsp;Exporter en excel</a>
            <a type="button" class="btn btn-info" href="{{ route('divisions.exportpdf') }}"><span class="fa fa-print"></span>&nbsp;&nbsp;Exporter en pdf</a>
            <a type="button" class="btn btn-primary" href="{{ route('divisions.import') }}"><span class="fa fa-print"></span>&nbsp;&nbsp;Importer</a>
            <form action="{{ route('divisions.recherche') }}" class="d-flex mr-3">
                <div class="form-group mb-0 mr-1">
                    <input type="text" name="recherche" id="recherche" value="{{ request()->recherche ?? '' }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            <a type="button" class="btn btn-success" data-toggle="modal" onclick="open_modal();" data-target="open" id="create_direction"><span class="fa fa-plus"></span>&nbsp;&nbsp;Créer une division</a>
        </div>
        <div class="table-reponsive">
            <table style="border-bottom:1px solid #ccc;" class="table table-hover">
                <thead>
                    <tr>
                        <th>Idientifiant(s)</th>
                        <th>Nom(s)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($divisions as $d)
                        <tr>
                            <td>{{  $d->id }}</td>
                            <td class="text-center"><a href="/divisions/{{ $d->id }}/AfficherTousLesPersonnesDansDivisions" style="text-decoration:none;">{{  $d->nom_divisions }}</a></td>
                            <td>
                                <a href="/divisions/{{ $d->id }}/modification" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                                <form action="/divisions/{{ $d->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('êtes-vous sur !')" type="submit" class="btn btn-danger"><span class="fa fa-trash-o"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="entete">
            <small>{{ $nombre_totals > 0 ? 'Il y a '.$nombre.' / '.$nombre_totals.' éléments': 'Il n\'y aucun élément' }}</small>
            {{ $divisions->links() }}
        </div>
    </div>
@stop
