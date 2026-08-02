<div class="form-group">
    <label>Titre du poste</label>
    <input type="text" name="titre" value="{{ old('titre', $offre->titre ?? '') }}" placeholder="Ex: Développeur Laravel" required>
    @error('titre') <div class="form-error">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Entreprise</label>
    <input type="text" name="entreprise" value="{{ old('entreprise', $offre->entreprise ?? Auth::user()->recruteur?->entreprise) }}" placeholder="Nom de l'entreprise" required>
    @error('entreprise') <div class="form-error">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Localisation</label>
    <input type="text" name="localisation" value="{{ old('localisation', $offre->localisation ?? '') }}" placeholder="Ex: Antananarivo" required>
    @error('localisation') <div class="form-error">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Description du poste</label>
    <textarea name="description" rows="8" placeholder="Missions, profil recherché, avantages...">{{ old('description', $offre->description ?? '') }}</textarea>
    @error('description') <div class="form-error">{{ $message }}</div> @enderror
</div>
