@extends('partials._content', ['titre' => 'Directions'])

@section('contenu')

    @include('directions.create')

    <div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        @include('partials.message.alert')
        <div class="col-sm-12 chemin">
            <h4>Directions</h4>
        </div>
    </div>
    <div class="content shadow p-3 mb-4">
            <div class="row mb-4 mt-2">
                <div class="col-md-4">
                    <h4 class="text-muted">Liste des Directions</h4>
                </div>
                <div class="col-md-8">
                    <div class="btn-tollbar" role="toolbar">
                        <div class="btn-group" role="group">
                            <a type="button" class="btn btn-info" href="{{ route('directions.exportexcel') }}"><span class="fa fa-print"></span>&nbsp;&nbsp;Exporter en excel</a>
                            <a type="button" class="btn btn-info" href="{{ route('directions.exportpdf') }}"><span class="fa fa-print"></span>&nbsp;&nbsp;Exporter en pdf</a>
                            <a type="button" class="btn btn-primary" href="{{ route('directions.import') }}"><span class="fa fa-print"></span>&nbsp;&nbsp;Importer</a>
                            <a type="button" class="btn btn-success" data-toggle="modal" onclick="open_modal();" data-target="open" id="create_direction"><span class="fa fa-plus"></span>&nbsp;&nbsp;Créer une direction</a>
                        </div>
                        <div class="btn-group">
                            <form action="{{ route('directions.recherche') }}" class="d-flex mr-3">
                                <div class="form-group mb-0 mr-1">
                                    <input type="text" name="recherche" id="recherche" value="{{ request()->recherche ?? '' }}" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <div class="table-reponsive">
            <table style="border-bottom:1px solid #ccc;" class="table table-hover">
                <thead>
                    <tr>
                        <th>Idientifiant(s)</th>
                        <th>Nom(s)</th>
                        <th>Sigle(s)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($directions as $d)
                        <tr>
                            <input type="hidden" class="diretiondelete_val_id" value="{{ $d->id }}">
                            <td>{{  $d->id }}</td>
                            <td class="text-left"><b><a href="{{ route('directions.AfficherTousLesPersonnesDansDirections',['direction' => $d->id]) }}" style="text-decoration:none;">{{  $d->nom_directions }}</a></b></td>
                            <td><a href="{{ route('directions.AfficherTousLesPersonnesDansDirections',['direction' => $d->id ]) }}" style="text-decoration:none;">{{  $d->sigle_directions }}</a></td>
                            <td>
                                <a href="{{ route('directions.modifier',['direction' => $d->id]) }}" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                                <form action="{{ route('directions.supprimer',['direction' =>$d->id]) }}" method="post" class="d-inline" onsubmit="return confirm('Etes-vous sur?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o"></span></button>
                                </form>
                                {{-- <button type="submit" class="btn btn-danger btndeletedirections"><span class="fa fa-trash-o"></span></button>
                                <a href="{{ route('directions.supprimer',['direction' => $d->id]) }}" data-method="DELETE" data-confirm="Etes-vous sur?" class="btn btn-dan"><span class="fa fa-trash-o"></span></a> --}}
                             </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="entete">
            <small>{{ $nombre_totals > 0 ? 'Il y a '.$nombre.' / '.$nombre_totals.' éléments': 'Il n\'y aucun élément' }}</small>
            {{ $directions->links() }}
        </div>
    </div>
@stop

