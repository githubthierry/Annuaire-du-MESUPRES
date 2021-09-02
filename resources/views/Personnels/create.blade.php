<?php
    use App\Http\Controllers\PersonnelsController;
?>

@extends('partials._content',['titre' => 'Créer un personne'])

@section('contenu')

<div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        @include('partials.message.alert')
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
            {{-- <!-- Informations personnels -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo">Photo<span class="obligatoire">&nbsp;*</span></label>
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
                                <input type="text" autocomplete="off" name="nom" id="nom" autofocus value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror" placeholder="Entrer votre nom">
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
                                <input type="text" name="prenom" autocomplete="off" id="prenom" value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror" placeholder="Entrer votre prénom">
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
                                <input type="date" name="ne" autocomplete="off" id="ne" value="{{ old('ddn') }}" class="form-control @error('ne') is-invalid @enderror">
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
                                <input type="email" autocomplete="off" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="xyz@gmail.com">
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
                                <input type="number" autocomplete="off" name="contact" id="contact" value="{{ old('contact') }}" class="form-control @error('contact') is-invalid @enderror" placeholder="Entrer votre contact">
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
                                <input type="text" name="adresse" autocomplete="off" value="{{ old('adresse') }}" id="adresse" class="form-control @error('adresse') is-invalid @enderror" placeholder="Entrer votre adresse">
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
                                <input type="number" name="im" id="im" autocomplete="off" value="{{ old('im') }}" class="form-control @error('im') is-invalid @enderror">
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
                                <input type="text" autocomplete="off" name="diplome" id="diplome" value="{{ old('adresse') }}" class="form-control @error('diplome') is-invalid @enderror">
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
                                <input type="text" autocomplete="off" name="specialite" id="specialite" value="{{ old('specialite') }}" class="form-control @error('specialite') is-invalid @enderror" placeholder="Entrer votre spécialité">
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
                                <input type="text" autocomplete="off" name="grade" id="grade" value="{{ old('grade') }}" class="form-control @error('grade') is-invalid @enderror" placeholder="Entrer votre observation">
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
                                <label for="directions">
                                    Directions
                                </label>
                                <select class="form-control directionsservices" name="directions" id="directions">
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
                                <label for="services">
                                    Services
                                </label>
                                <select class="form-control nomservices servicesdivisions" name="services" id="services">
                                    <option selected="true" disabled value="0"></option>
                                </select>
                            </div>
                        </div>
                        <!-- Divisions -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="divisions">
                                    Divisions
                                </label>
                                <select class="form-control nomdivisions" name="divisions" id="divisions">
                                    <option selected="true" disabled value="0"></option>
                                </select>
                            </div>
                        </div>

                        <!-- Date d'entrée dans l'admin -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_debut_admin">
                                    Date d'entrée dans l'admin
                                </label>
                                <input type="date" name="date_debut_admin" autocomplete="off" value="{{ old('date_debut_admin') }}" id="date_debut_admin" class="form-control @error('date_debut_admin') is-invalid @enderror">
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
                    <!-- Profiles Postes -->
                    <div class="form-group">
                        <label for="profiles_postes">Profile Poste</label>
                        <textarea autocomplete="off" name="profiles_postes" id="profiles_postes" cols="100" rows="10" class="form-control"></textarea>
                        @error('profiles_postes')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div> --}}

            @include('Personnels._form',['submitButtonText' => 'Ajouter'])

        </form>
        </div>
    </div>
</div>

@stop
