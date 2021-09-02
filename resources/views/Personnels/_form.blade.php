<!-- Informations personnels -->
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <img src="{{ Storage::url($personnel->photo_personnels) }}" class="avatar mb-4 mt-3 img-rounded img-thumbnail" style="height:250px;width:250px;" alt="avatar">
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
                    <label for="nom" class="control-label">Nom</label>
                    <input type="text" name="nom" autocomplete="off" id="nom" autofocus value="{{ old('nom') ?? $personnel->nom_personnels }}" class="form-control @error('nom') is-invalid @enderror" placeholder="Entrer votre nom">
                    @error('nom')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prenom" class="control-label">Prénom</label>
                    <input type="text" name="prenom" autocomplete="off" id="prenom" value="{{ old('prenom') ?? $personnel->prenom_personnels }}" class="form-control @error('prenom') is-invalid @enderror" placeholder="Entrer votre prénom">
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
                    <label for="ne" class="control-label">Date de naissance</label>
                    <input type="date" name="ne" autocomplete="off" id="ne" value="{{ old('ne') ?? $personnel->ddn_personnels }}" class="form-control @error('ne') is-invalid @enderror">
                    @error('ne')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sexe" class="controle-label">Sexe</label>
                    <div class="d-flex">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input type="radio" name="sexe" id="genderM" {{ (old('sexe') ?? $personnel->sexe_personnels) == 'H' ? 'checked' : '' }} class="form-check-input @error('sexe') is-invalid @enderror" value="H">
                                <label for="genderM" class="form-check-label">Homme</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="radio" {{ (old('sexe') ?? $personnel->sexe_personnels) == 'F' ? 'checked' : '' }} name="sexe" id="genderF" value="F" class="form-check-input @error('sexe') is-invalid @enderror">
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
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" value="{{ old('email') ?? $personnel->email_personnels }}" class="form-control @error('email') is-invalid @enderror" placeholder="xyz@gmail.com">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact" class="control-label">Contact</label>
                    <input type="number" name="contact" autocomplete="off" id="contact" value="{{ old('contact') ?? $personnel->contact_personnels }}" class="form-control @error('contact') is-invalid @enderror" placeholder="Entrer votre contact">
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
                    <label for="adresse" class="control-label">Adresse</label>
                    <input type="text" name="adresse" autocomplete="off" value="{{ old('adresse') ?? $personnel->adresse_personnels }}" id="adresse" class="form-control @error('adresse') is-invalid @enderror" placeholder="Entrer votre adresse">
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
        <!-- ********************* IM et Fonctions ************************************************* -->
        <div class="row">
            <!-- IM ou CDE -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="im" class="control-label">IM ou CIN (ECD)</label>
                    <input type="number" autocomplete="off" name="im" id="im" value="{{ old('im') ?? $personnel->im_personnels }}" class="form-control @error('im') is-invalid @enderror">
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
                    <label for="postes" class="control-label">Fonctions</label>
                    <select class="form-control " name="postesID" id="postes">
                        <option value=""></option>
                        @foreach($postes as $poste)
                                <option value="{{ $poste->id }}" {{ $poste->id == $personnel->postes_id ? 'selected':'' }}>{{ $poste->nom_postes }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <!-- ********************* Diplôme et Spécialisation ************************************************* -->
        <div class="row">
            <!-- Diplôme -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="diplome" class="control-label">Diplôme</label>
                    <input type="text" name="diplome" autocomplete="off" id="diplome" value="{{ old('diplome') ?? $personnel->diplome_personnels }}" class="form-control @error('diplome') is-invalid @enderror" placeholder="Entrer votre diplôme">
                    @error('diplome')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
            </div>
            <!-- Spécialisation -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="specialite" class="control-label">Spécialité</label>
                    <input type="text" autocomplete="off" name="specialite" id="specialite" value="{{ old('specialite') ?? $personnel->specialite_personnels }}" class="form-control @error('specialite') is-invalid @enderror" placeholder="Entrer votre spécialité">
                    @error('specialite')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <!-- ********************* Grade et Directions ************************************************* -->
        <div class="row">
            <!-- Grade -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="grade" class="control-label">Grade</label>
                    <input type="text" autocomplete="off" name="grade" id="grade" value="{{ old('grade') ?? $personnel->grade_personnels }}" class="form-control @error('grade') is-invalid @enderror" placeholder="Entrer votre grade">
                    @error('grade')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
                <!-- Directions -->
                <div class="col-md-6">
                <div class="form-group">
                    <label for="directions">Directions</label>
                    <select class="form-control directionsservices" name="directions" id="directions">
                        <option value=""></option>
                        @foreach($directions as $dr)
                                <option value="{{ $dr->id }}" {{ $direction == null ? '' : ($dr->id == $direction->id ? 'selected':'') }}>{{ $dr->nom_directions }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- ********************* Grade et Directions ************************************************* -->
        <div class="row">
            <!-- Services -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="services" class="control-label">Services</label>
                    <select class="form-control nomservices servicesdivisions" name="services" id="services">
                        <option value=""></option>
                        @foreach($services as $s)
                                <option value="{{ $s->id }}" {{ $service == null ? '' : ( $s->id == $service->id ? 'selected':'') }}>{{ $s->nom_services }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <!-- Divisions -->
                <div class="col-md-6">
                <div class="form-group">
                    <label for="divisions" class="control-label">Divisions</label>
                    <select class="form-control nomdivisions" name="divisions" id="divisions">
                        <option value=""></option>
                        @foreach($divisions as $d)
                                <option value="{{ $d->id }}" {{  $division == null ? '': ( $d->id == $division->id ? 'selected':'') }}>{{ $d->nom_divisions }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <!-- Date d'entrée -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="date_debut_admin" class="control-label">Date d'entrée dans l'admin</label>
                <input type="date" name="date_debut_admin" autocomplete="off" value="{{ old('date_debut_admin') ?? $personnel->date_entre_admin_personnels }}" id="date_debut_admin" class="form-control @error('date_debut_admin') is-invalid @enderror">
                @error('date_debut_admin')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
        </div>
        <!-- Observation -->
        <div class="col-md-12">
                <div class="form-group">
                <label for="profiles_postes" class="control-label">Profiles Postes</label>
                <textarea name="profiles_postes" id="profiles_postes" class="form-control" cols="30" rows="10">{{ $personnel->profile_poste_personnels }}</textarea>
            </div>
        </div>
    </div>
</div>

<hr>
<div style="display:flex;justify-content:flex-end;">
    <input type="submit" class="btn btn-primary" value="{{ $submitButtonText }}"/>
    <a style="margin-left:5px;" href="{{ route('personnels.index') }}" class="btn btn-danger" type="button">Annuler</a>
</div>
