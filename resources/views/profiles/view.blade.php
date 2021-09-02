@extends('partials._content',['titre' => 'Utilisateurs'])

@section('contenu')
<div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        <div class="col-sm-12 chemin">
            <h4>Affichage d'une personne</h4>
        </div>
    </div>
    <div class="content shadow pl-3 pt-3 pr-3 pb-1 mb-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-style-header">
                        <h5>Infomation personnel</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                 <img style="display:block;margin:auto;" src="/storage/{{ str_replace('public/', '' , $personnels->photo_personnels) }}" class="img img-rounded img-thumbnail" width="250px" height="250px" alt="...">
                            </div>

                            <div class="col-sm-12">
                                <hr>
                                <p><b class="color">Nom :</b> {{ $personnels->nom_personnels }}</p>
                                    <hr>
                                <p><b class="color">Prénom :</b> {{ $personnels->prenom_personnels }}</p>
                                    <hr>
                                <p><b class="color">Date de naissance : </b>{{ $personnels->ddn_personnels ? Carbon\Carbon::parse($personnels->ddn_personnels)->format('d/m/y') : '-' }}</p>
                                    <hr>
                                <p><b class="color">Sexe :</b> {{ ($personnels->sexe_personnels == 'H' ) ? 'Homme':'Femme' }}</p>
                                    <hr>
                                <p><b class="color">Email :</b> {{ $personnels->email_personnels }}</p>
                                    <hr>
                                <p><b class="color">Téléphone :</b> {{ $personnels->contact_personnels }}</p>
                                    <hr>
                                <p><b class="color">Adresse :</b> {{ $personnels->adresse_personnels }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-style-header">
                        <h5>Autres Informations</h5>
                    </div>
                    <div class="card-body">
                        <!-- IM et Fonctions -->
                        <div class="row">
                            <div class="col-md-6">
                                <b style="color:#2c8682;">IM OU CDI</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">{{ $personnels->im_personnels }}</p>
                            </div>
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Fonctions</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">
                                    {{ (PersonnelsController::NomPostes($personnels->postes_id)) == null ? ' - ': (PersonnelsController::NomPostes($personnels->postes_id))->nom_postes }}
                                </p>
                            </div>
                        </div>
                        <!-- Diplôme et Spécialité -->
                        <div class="row">
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Diplôme</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">{{ $personnels->diplome_personnels }}</p>
                            </div>
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Spécialité</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">{{ $personnels->specialite_personnels }}</p>
                            </div>
                        </div>
                        <!-- Grade et Directions -->
                        <div class="row">

                            <div class="col-md-6">
                                <b style="color:#2c8682;">Grade</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">{{ $personnels->grade_personnels }}</p>
                            </div>
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Directions</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">
                                    {{ (PersonnelsController::NomDirections($personnels->directions_id)) == null ? ' - ': (PersonnelsController::NomDirections($personnels->directions_id))->nom_directions }}
                                </p>
                            </div>
                        </div>
                        <!-- Service et Divisions -->
                        <div class="row">
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Services</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">
                                     {{ (PersonnelsController::NomServices($personnels->services_id)) == null ? ' - ': (PersonnelsController::NomServices($personnels->services_id))->nom_services }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Divisions</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">
                                {{ (PersonnelsController::NomDivisions($personnels->divisions_id)) == null ? ' - ': (PersonnelsController::NomDivisions($personnels->divisions_id))->nom_divisions }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Date d'entrée</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;"> {{ $personnels->date_debut_admin_personnels ? Carbon\Carbon::parse($personnels->date_debut_admin_personnels)->format('d/m/y') : '-' }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12" >
                            <b style="color:#2c8682;text-align:center;display:block;">Profiles Poste</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;"> {{ $personnels->date_debut_admin_personnels ? Carbon\Carbon::parse($personnels->date_debut_admin_personnels)->format('d/m/y') : '-' }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group" style="display:flex;justify-content:flex-end;">
            <a href="{{ route('personnels.index') }}"  class="btn btn-warning">Retour</a>
        </div>
    </div>
</div>
@stop
