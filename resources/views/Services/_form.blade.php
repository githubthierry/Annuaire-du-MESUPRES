<div class="form-group">
    <label for="nom" class="control-label">Nom</label>
    <input type="text" autocomplete="off" autofocus value="{{ old('nom') ?? $service->nom_services }}" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="Entrer votre nom">
    @error('nom')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="sigle" class="control-label">Sigle</label>
    <input type="text" name="sigle" autocomplete="off" value="{{ old('sigle') ?? $service->sigle_services }}" id="sigle" class="form-control @error('sigle') is-invalid @enderror" placeholder="Entrer son sigle">
    @error('sigle')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="directionsID" class="control-label">Directions</label>
    <select name="directionsID" class="form-control" id="directionsID">
        <option value=""></option>
        @foreach($directions as $d)
               <option value="{{ $d->id }}" {{ $d->id == $service->directions_id ? 'selected':'' }}>{{ $d->sigle_directions }} > {{ $d->nom_directions }}</option>
        @endforeach
    </select>
</div>

<hr>

<div class="form-group" style="display:flex;justify-content:flex-end;">
    <input type="submit" value="{{ $submitButtonText }}" class="btn btn-primary" type="button">
    <a href="{{ route('services.index') }}" data-dismiss="modal" class="btn btn-danger ml-2" type="button">Annuler</a>
</div>
