@extends('partials._content',['titre' => 'Utilisateurs'])

@section('contenu')
<div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        <div class="col-sm-12 chemin">
            <h4>Utilisateurs</h4>
        </div>
    </div>
    <div class="content shadow p-3 mb-4">

        <div class="entete">
                <h4 class="text-muted">Liste des utilisateurs</h4>
                <form action="{{ route('utilisateurs.recherche') }}" class="d-flex mr-3">
                <div class="form-group mb-0 mr-1">
                    <input type="text" name="recherche" id="recherche" value="{{ request()->recherche ?? '' }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Photo(s)</th>
                        <th>Nom(s)</th>
                        <th>Email(s)</th>
                        <th>Roles</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $p)
                    <tr>
                        <td>{{  $p->id }}</td>
                        <td class="text-center">
                            <img src="{{ $p->photo_profile_path == null ? '../images/photo.png' : ''  }}" class="img img-circle" style="width:40px;border-radius:3px;" alt="...">
                        </td>
                        <td>{{  $p->name }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->roles_id == null ? '-': $p->roles->adminRoles }}</td>
                        <td class="text-left">
                            <ul>
                                @foreach ($p->roles->Permissions_Roles as $role)
                                    <li>{{ $role->permissions->nom_permissions }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('utilisateurs.afficher',['user' => $p->id ]) }}" class="btn btn-warning"><span class="fa fa-eye"></span></a>
                            {{-- <a href="{{ route('utilisateurs.modifier',['user' => $p->id ]) }}" class="btn btn-primary"><span class="fa fa-edit"></span></a> --}}
                            <form action="{{ route('utilisateurs.supprimer',['user' => $p->id ]) }}" method="post" class="d-inline">
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
            {{ $users->links() }}
        </div>
    </div>
</div>
@stop
