@extends('partials._content',['titre' => 'Voir personne'])

@section('contenu')
<div class="mx-auto col-md-12">

    <div class="content col-md-6 shadow pl-3 mx-auto pt-3 pr-3 pb-1 mb-4">
        <div class="card">
            <div class="card-header card-style-header">
                <h5>Infomation personnel</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                            <img style="display:block;margin:auto;" src="{{ $users->profile_photo_path == null ? '../../images/photo.png' : Storage::url($users->profile_photo_path) }}" class="img img-rounded img-thumbnail" width="250px" height="250px" alt="...">
                    </div>
                    <div class="col-sm-12">
                        <hr>
                        <p><b class="color">Nom :</b> {{ $users->name }}</p>
                            <hr>
                        <p><b class="color">Email :</b> {{ $users->email }}</p>
                            <hr>
                        <p><b class="color">Rôle :</b> {{ $users->roles->adminRoles }}</p>
                            <hr>
                        <p><b class="color">Permissions :</b></p>
                            <ul style="margin-left: 4rem;">
                                @foreach ($users->roles->Permissions_Roles as $role)
                                    <li>{{ $role->permissions->nom_permissions }}</li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group" style="display:flex;justify-content:flex-end;">
            <a type="button" class="btn btn-primary mr-2" href="{{ route('utilisateurs.modifier',['id' => 1]) }}">Modifier</a>
            <a href="{{ route('utilisateurs.index') }}"  class="btn btn-warning">Retour</a>
        </div>
    </div>
</div>
@stop
