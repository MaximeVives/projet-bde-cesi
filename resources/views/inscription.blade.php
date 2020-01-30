<!doctype html>
<html lang="fr">
<head>
	<title>Inscription</title>
	<?php
	include('html/header.php');
	?>
</head>
<body>
	<?php
	$pageName = "Inscription";
	include('html/top-accueil-page.php');
	include('html/nav-bar.php');
	include('html/code-couleur.php')
	?>

	<main>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">{{ __("Formulaire d'inscription") }}</div>

						<div class="card-body">
							<form method="POST" action="{{ route('register') }}">
								@csrf

								<div class="form-group row">
									<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

									<div class="col-md-6">
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse mail') }}</label>

									<div class="col-md-6">
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

									<div class="col-md-6">
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation mot de passe') }}</label>

									<div class="col-md-6">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
									</div>
								</div>
								<div class="form-group row">
									<label for="id_centre" class="col-md-4 col-form-label text-md-right">{{ __('Centre de formation') }}</label>

									<div class="col-md-6">
										<select name="id_centre" class="form-control">
											<option value="1">Aix-en-provence</option>
											<option value="2">Alger</option>
											<option value="3">Angoulême</option>
											<option value="4">Arras</option>
											<option value="5">Bordeaux</option>
											<option value="6">Brest</option>
											<option value="7">Caen</option>
											<option value="8">Dijon</option>
											<option value="9">Douala</option>
											<option value="10">Grenoble</option>
											<option value="11">La Rochelle</option>
											<option value="12">Le Mans</option>
											<option value="13">Lille</option>
											<option value="14">Lyon</option>
											<option value="15">Montpellier</option>
											<option value="16">Nancy</option>
											<option value="17">Nantes</option>
											<option value="18">Nice</option>
											<option value="19">Orléans</option>
											<option value="20">Paris Nanterre</option>
											<option value="21">Pau</option>
											<option value="22">Reims</option>
											<option value="23">Rouen</option>
											<option value="24">Saint-Nazaire</option>
											<option value="25">Strasbourg</option>
											<option value="26">Toulouse</option>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label for="id_statut" class="col-md-4 col-form-label text-md-right">{{ __("Statut de l'inscrit") }}</label>

									<div class="col-md-6">
										<select name="id_statut" class="form-control">
											<option value="1">Membre du BDE</option>
											<option value="2">Apprenant</option>
											<option value="3">Etudiant</option>
										</select>
									</div>
								</div>

								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-4">
										<button type="submit" class="btn btn-primary">
											{{ __("S'inscrire") }}
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</main>

	<?php
	include('html/footer.php');
	?>
</body>
</html>
