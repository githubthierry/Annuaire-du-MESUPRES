@extends('partials._content',['titre' => 'Modifier un utilisateur'])

@section('contenu')
    <div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        <div class="col-sm-12 chemin">
            <h4>Utilisateurs</h4>
        </div>
    </div>

    <!-- Information -->
    <div class="mx-auto col-md-8">
        <div class="card" >
            <div class="card-header" style="background:#2c8682;opacity:0.8;">
                <h5 class="text-white">Modifier un utilisateur</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('utilisateurs.chargement',['user' => $users->id  ]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Informations personnels -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <img src="{{ $users->profile_photo_path == null ? '../../images/photo.png' : Storage::url($users->profile_photo_path) }}" class="avatar mb-4 mt-3 img-rounded img-thumbnail" style="height:250px;width:250px;" alt="avatar">
                            <input type="file" name="photo" id="photo" class="p-1 form-control file-upload @error('photo') is-invalid @enderror">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-8 bordure" >
                        <!----------------------------------- Nom, Email , Roles ---------------------------------------------------------->
                        <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" id="nom" autocomplete="off" autofocus value="{{ old('nom',$users->name) }}" class="form-control @error('nom') is-invalid @enderror" placeholder="Entrer votre nom">
                                        @error('nom')
                                            <div class="invalid-feedback">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" autocomplete="off" value="{{ old('email',$users->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="xyz@gmail.com">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="roles_id">Roles</label>
                                        <select name="roles_id" id="roles_id" class="form-control">
                                            <option value=""></option>
                                            @foreach ($roles as $r)
                                                <option value="{{ $r->id }}" {{ $users->roles_id == $r->id ? 'selected':'' }}>{{ $r->adminRoles }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 mr-2" style="display:flex;flex-direction:row;justify-content:flex-end;">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <a style="margin-left:5px;" href="{{ route('personnels.index') }}" class="btn btn-danger" type="button">Retour</a>
                            </div>

                        </div>
                        <!----------------------------------- Roles ---------------------------------------------->
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@stop
