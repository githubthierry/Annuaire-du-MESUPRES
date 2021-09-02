<div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" value="{{ old('nom') ?? $poste->nom_postes }}" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom du poste" autofocus autocomplete="off">
    @error('nom')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" class="form-control @error('description') is-invalid @enderror" rows="10" placeholder="Description du poste">{{ $poste->description ?? '' }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group" style="display:flex;justify-content:flex-end;">
    <input type="submit" value="{{ $submitButtonText }}" class="btn btn-primary" type="button">
    <a href="{{ route('postes.index') }}" class="btn btn-danger ml-2" type="button">Annuler</a>
</div>
