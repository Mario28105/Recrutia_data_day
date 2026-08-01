@extends('recruteur.layout')

@section('title', 'Profil entreprise')
@section('topbar_title', 'Profil entreprise')

@section('content')

<div class="card" style="max-width:650px;">

    <h2>Profil de l'entreprise</h2>

    <form method="POST" action="{{ route('recruteur.profil.update') }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label>Nom de l'entreprise</label>
            <input type="text" name="entreprise" value="{{ old('entreprise', $recruteur->entreprise ?? '') }}" required>
            @error('entreprise') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Votre poste</label>
            <input type="text" name="poste" value="{{ old('poste', $recruteur->poste ?? '') }}" placeholder="Ex: Responsable RH">
            @error('poste') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" name="telephone" value="{{ old('telephone', $recruteur->telephone ?? '') }}">
            @error('telephone') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Site web</label>
            <input type="url" name="site_web" value="{{ old('site_web', $recruteur->site_web ?? '') }}" placeholder="https://...">
            @error('site_web') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Description de l'entreprise</label>
            <textarea name="description_entreprise" rows="6">{{ old('description_entreprise', $recruteur->description_entreprise ?? '') }}</textarea>
            @error('description_entreprise') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Enregistrer</button>

    </form>

</div>

@endsection
