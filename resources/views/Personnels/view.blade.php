@extends('partials._content',['titre' => 'Voir personne'])

@section('contenu')
<div class="mx-auto col-md-12">
    <!-- Chemin -->
    <div class="row" style="margin:auto;">
        <div class="col-sm-12 chemin">
            <h4>Affichage d'une personne</h4>
        </div>
    </div>
    <div class="content shadow pl-3 pt-3 pr-3 pb-1 mb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-style-header">
                        <h5>Infomation personnel</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                 <img style="display:block;margin:auto;" src="{{ Storage::url($personnel->photo_personnels) }}" class="img img-rounded img-thumbnail" width="250px" height="250px" alt="...">
                            </div>

                            <div class="col-sm-12">
                                <hr>
                                <p><b class="color">Nom :</b> {{ $personnel->nom_personnels ?? '-' }}</p>
                                    <hr>
                                <p><b class="color">Prénom :</b> {{ $personnel->prenom_personnels ?? '-'  }}</p>
                                    <hr>
                                <p><b class="color">Date de naissance : </b>{{ $personnel->ddn_personnels ? Carbon\Carbon::parse($personnel->ddn_personnels)->format('d/m/y') : '-' }}</p>
                                    <hr>
                                <p><b class="color">Sexe :</b> {{ ($personnel->sexe_personnels == 'H' ) ? 'Homme':'Femme' }}</p>
                                    <hr>
                                <p><b class="color">Email :</b> {{ $personnel->email_personnels ?? '-' }}</p>
                                    <hr>
                                <p><b class="color">Téléphone :</b> {{ $personnel->contact_personnels ?? '-' }}</p>
                                    <hr>
                                <p><b class="color">Adresse :</b> {{ $personnel->adresse_personnels ?? '-' }}</p>
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
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">{{ $personnel->im_personnels }}</p>
                            </div>
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Fonctions</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">
                                    {{ $personnel->postes_id == null ? ' - ': $personnel->postes->nom_postes }}
                                </p>
                            </div>
                        </div>
                        <!-- Diplôme et Spécialité -->
                        <div class="row">
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Diplôme</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">{{ $personnel->diplome_personnels }}</p>
                            </div>
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Spécialité</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">{{ $personnel->specialite_personnels }}</p>
                            </div>
                        </div>
                        <!-- Grade et Directions -->
                        <div class="row">

                            <div class="col-md-6">
                                <b style="color:#2c8682;">Grade</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">{{ $personnel->grade_personnels }}</p>
                            </div>
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Directions</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">
                                    {{ $directions->nom_directions ?? ' - ' }}
                                </p>
                            </div>
                        </div>
                        <!-- Service et Divisions -->
                        <div class="row">
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Services</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">
                                     {{ $services->nom_services ?? ' - ' }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Divisions</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;">
                                    {{  $divisions->nom_divisions ?? '-' }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <b style="color:#2c8682;">Date d'entrée</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;"> {{ $personnel->date_entre_admin_personnels ? Carbon\Carbon::parse($personnel->date_entre_admin_personnels)->format('d/m/y') : '-' }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12" >
                            <b style="color:#2c8682;text-align:center;display:block;">Profiles Poste</b>
                                <br>
                                <p style="background:#ccc;padding:.5rem;border-radius:2px;"> {{ $personnel->profile_poste_personnels ?? '-' }}</p>
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
