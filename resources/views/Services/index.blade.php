@extends('partials._content', ['titre' => 'Services'])

@section('contenu')

    @include('services.create')
    <div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        @include('partials.message.alert')
        <div class="col-sm-12 chemin">
            <h4>Services</h4>
        </div>
    </div>
    <div class="content shadow p-3 mb-4">
        <div class="entete">
            <h4 class="text-center text-muted">Liste des Services</h4>
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="btnExport" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="fa fa-print"></span> Export
                </button>
                <ul class="dropdown-menu dropdown-menu-info" aria-labelledby="btnExport">
                  <li><a class="dropdown-item" href="{{ route('services.exportpdf') }}">- En PDF</a></li>
                  <li><a class="dropdown-item" href="{{ route('services.exportexcel') }}">- En Excel</a></li>
                </ul>
              </div>
            <a type="button" class="btn btn-primary" href="{{ route('services.import') }}"><span class="fa fa-print"></span>&nbsp;&nbsp;Importer</a>
            <form action="{{ route('services.recherche') }}" class="d-flex mr-3">
                <div class="form-group mb-0 mr-1">
                    <input type="text" name="recherche" id="recherche" value="{{ request()->recherche ?? '' }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            <a type="button" class="btn btn-success" data-toggle="modal" onclick="open_modal();" data-target="open" id="create_direction"><span class="fa fa-plus"></span>&nbsp;&nbsp;Créer une service</a>
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
                    @foreach($services as $s)
                        <tr>
                            <td>{{  $s->id }}</td>
                            <td><b><a href="{{ route('services.AfficherTousLesPersonnesDansServices',['service' => $s->id ]) }}" style="text-decoration:none;">{{  $s->nom_services }}</a></b></td>
                            <td><a href="{{ route('services.AfficherTousLesPersonnesDansServices',['service' => $s->id ]) }}" style="text-decoration:none;">{{  $s->sigle_services }}</a></td>
                            <td>
                                <a href="{{ route('services.modifier',['service' => $s->id ]) }}" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                                <form action="{{ route('services.supprimer',['service' => $s->id ]) }}" method="post" class="d-inline">
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
            {{ $services->links() }}
        </div>
    </div>
@stop
