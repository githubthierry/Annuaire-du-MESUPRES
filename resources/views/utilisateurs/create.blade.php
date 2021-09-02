@extends('welcome',['titre' => 'Créer un personne'])

@section('contenu')

<div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        <div class="col-sm-12 chemin">
            <h4>Personnes</h4>
        </div>
    </div>
    <!-- Information -->
    <div class="card mb-4">
        <div class="card-header" style="background:#2c8682;opacity:0.8;">
            <h5 class="text-white">Créer une personne</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('personnels.traitement') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Informations personnels -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="image">Photo<span class="obligatoire">&nbsp;*</span></label>
                        <img src="../../../../../../images/user.png" class="avatar img-rounded img-thumbnail" style="height:250px;width:250px;" alt="avatar">
                        <input type="file" name="photo" id="photo" class="p-1 form-control file-upload @error('photo') is-invalid @enderror">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8 bordure" >
                    <!----------------------------------- Nom et Prénom ---------------------------------------------------------->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom">Nom <span class="obligatoire">&nbsp;*</span></label>
                                <input type="text" name="nom" id="nom" autofocus value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror" placeholder="Entrer votre nom">
                                @error('nom')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror" placeholder="Entrer votre prénom">
                                @error('prenom')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!----------------------------------- Date de naissance et Sexe ---------------------------------------------->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ne">Date de naissance<span class="obligatoire">&nbsp;*</span></label>
                                <input type="date" name="ne" id="ne" value="{{ old('ddn') }}" class="form-control @error('ne') is-invalid @enderror">
                                @error('ne')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sexe">
                                sexe<span class="obligatoire">&nbsp;*</span>
                                </label>
                                <div class="d-flex">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" name="sexe" id="genderM" {{ old('sexe') == 'H' ? 'checked' : '' }} class="form-check-input @error('sexe') is-invalid @enderror" value="H">
                                            <label for="genderM" class="form-check-label">Homme</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="radio" {{ old('sexe') == 'F' ? 'checked' : '' }} name="sexe" id="genderF" value="F" class="form-check-input @error('sexe') is-invalid @enderror">
                                            <label for="genderF" class="form-check-label">Femme</label>
                                        </div>
                                    </div>
                                </div>
                                @error('sexe')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!----------------------------------- Email et Contact ---------------------------------------------->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email<span class="obligatoire">&nbsp;*</span></label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="xyz@gmail.com">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact">Contact<span class="obligatoire">&nbsp;*</span></label>
                                <input type="number" name="contact" id="contact" value="{{ old('contact') }}" class="form-control @error('contact') is-invalid @enderror" placeholder="Entrer votre contact">
                                @error('contact')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="adresse">
                                    Adresse<span class="obligatoire">&nbsp;*</span>
                                </label>
                                <input type="text" name="adresse" value="{{ old('adresse') }}" id="adresse" class="form-control @error('adresse') is-invalid @enderror" placeholder="Entrer votre adresse">
                                @error('adresse')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Informatio sur le travail -->
            <hr>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <!-- IM -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="im">
                                    IM ou CIN (ECD)
                                </label>
                                <input type="number" name="im" id="im" value="{{ old('im') }}" class="form-control @error('im') is-invalid @enderror">
                                @error('im')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Fonctions -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fonction">
                                    Fonctions
                                </label>
                                <select class="form-control " name="postesID" id="fonction">
                                    <option value=""></option>
                                    @foreach($postes as $poste)
                                         <option value="{{ $poste->id }}">{{ $poste->nom_postes }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <!-- Diplôme -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diplome">Diplôme plus élévé</label>
                                <input type="text" name="diplome" id="diplome" value="{{ old('adresse') }}" class="form-control @error('diplome') is-invalid @enderror">
                                @error('diplome')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Spécialité -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specialite">Spécialité</label>
                                <input type="text" name="specialite" id="specialite" value="{{ old('specialite') }}" class="form-control @error('specialite') is-invalid @enderror" placeholder="Entrer votre spécialité">
                                @error('specialite')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- Grade -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="grade">Grade</label>
                                <input type="text" name="grade" id="grade" value="{{ old('grade') }}" class="form-control @error('grade') is-invalid @enderror" placeholder="Entrer votre observation">
                                @error('grade')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Misy rh eto -->
                    </div>
                    <div class="row">
                        <!-- Directions -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fonction">
                                    Directions
                                </label>
                                <select class="form-control " name="directions" id="directions">
                                    <option value=""></option>
                                    @foreach($directions as $direction)
                                         <option value="{{ $direction->id }}">{{ $direction->nom_directions }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Services -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fonction">
                                    Services
                                </label>
                                <select class="form-control " name="services" id="services">
                                    <option value=""></option>
                                    @foreach($services as $service)
                                         <option value="{{ $service->id }}">{{ $service->nom_services }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Divisions -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fonction">
                                    Divisions
                                </label>
                                <select class="form-control " name="divisions" id="divisions">
                                    <option value=""></option>
                                    @foreach($divisions as $division)
                                         <option value="{{ $division->id }}">{{ $division->nom_divisions }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Date d'entrée dans l'admin -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_debut_admin">
                                    Date d'entrée dans l'admin
                                </label>
                                <input type="date" name="date_debut_admin" value="{{ old('date_debut_admin') }}" id="date_debut_admin" class="form-control @error('date_debut_admin') is-invalid @enderror">
                                @error('date_debut_admin')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Observation -->
                    <div class="form-group">
                        <label for="poste_profiles">Profile Poste</label>
                        <textarea name="poste_profiles" id="poste_profiles" cols="100" rows="10" class="form-control"></textarea>
                        @error('poste_profiles')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <hr>
            <div style="display:flex;flex-direction:row;justify-content:flex-end;">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a style="margin-left:5px;" href="{{ route('personnels.index') }}" class="btn btn-danger" type="button">Retour</a>
            </div>
        </form>
        </div>
    </div>
</div>

@stop
