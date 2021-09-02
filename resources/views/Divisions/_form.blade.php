<div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" autofocus autocomplete="off" value="{{ old('nom') ?? $division->nom_divisions }}" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="Entrer votre nom">
    @error('nom')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="servicesID">Services</label>
    <select name="servicesID" class="form-control" id="servicesID">
        <option value=""></option>
        @foreach($services as $s)
               <option value="{{ $s->id }}" {{ $s->id == $division->services_id ? 'selected' : '' }}>{{ $s->nom_services }}</option>
            @endforeach
    </select>
</div>

<hr>

<div class="form-group" style="display:flex;justify-content:flex-end;">
    <input type="submit" value="{{ $submitButtonText }}" class="btn btn-primary" type="button">
    <a href="{{ route('divisions.index') }}" data-dismiss="modal" class="btn btn-danger ml-2" type="button">Annuler</a>
</div>
