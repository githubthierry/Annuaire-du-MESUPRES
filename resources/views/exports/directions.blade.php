@extends('welcome', ['titre' => 'Listes des directions en Pdf'])

@section('contenu')

    <div class="container">
        <div class="row">
            <div class="col-md-7" align="right">
                <h4>Listes des directions</h4>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-borderd">
                <thead>
                    <tr>
                        <th>Identifiants</th>
                        <th>Nom du directions</th>
                        <th>Sigle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($directions as $d)
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->nom_directions }}</td>
                            <td>{{ $d->sigle_directions }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop
