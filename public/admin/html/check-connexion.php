<?php

	use Illuminate\Support\Facades\Auth;

	// Get the currently authenticated user...
	$user = Auth::user();

	// Get the currently authenticated user's ID...
	$id = Auth::id();

	if (Auth::check()) {
		echo('<div class="cart">
				<a class="btn-pannier" href="/panier"><i class="fas fa-shopping-cart"></i>   Voir le panier</a>
				
			</div>');
		echo('<div class="btn-disconnect">
		<a href="/logout"><i class="fas fa-sign-out-alt"></i>   Déconnecter</a>
		</div>');
	}
	else{
		echo('<h2 class="reg"><a class="inscr" href="/inscription">INSCRIVEZ-VOUS</a></h2>
					<p class="log"> Vous possédez déjà un compte ? <a class="connex" href="/connexion">Connectez-vous</a></p>');
	}


?>
