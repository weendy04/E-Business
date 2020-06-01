<?php
ob_start();
?>
<div class="container">
	<form method="post">
        <input type="hidden" name="idUtilisateur" value=<?=$utilisateur['idUtilisateur']?>>
	  <div class="form-group row">
		<label for="nom" class="col-sm-2 col-form-label">Nom</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="nom" name="nom" required value=<?=$utilisateur['nom']?>>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="prenom" name="prenom" required value=<?=$utilisateur['prenom']?>>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="Adresse" class="col-sm-2 col-form-label">Adresse:</label>
	  </div>
	   <div class="form-group row">
		<label for="nomRue" class="col-sm-2 col-form-label">Rue</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="nomRue" name="nomRue" required value=<?=$utilisateur['nomRue']?>>
		</div>
	  </div>
	   <div class="form-group row">
		<label for="numeroRue" class="col-sm-2 col-form-label">N°</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="numeroRue" name="numeroRue" required value=<?=$utilisateur['numeroRue']?>>
		</div>
	  </div>
	   <div class="form-group row">
		<label for="nomVille" class="col-sm-2 col-form-label">Ville</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="nomVille" name="nomVille" required value=<?=$utilisateur['nomVille']?>>
		</div>
	  </div>
	   <div class="form-group row">
		<label for="codePostal" class="col-sm-2 col-form-label">Code postal</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="codePostal" name="codePostal" required value=<?=$utilisateur['codePostal']?>>
		</div>
	  </div>	
		<div class="form-group row">
			<label for="Login" class="col-sm-2 col-form-label">Login:</label>
		</div>	  
	  <div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
		  <input type="email" class="form-control" id="email" name="email" required value=<?=$utilisateur['email']?>>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="mdp" class="col-sm-2 col-form-label">Ancien mot de passe</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control" id="ancienMdp" name="ancienMdp" required >
		</div>
	  </div>
	  <div class="form-group row">
		<label for="mdp" class="col-sm-2 col-form-label">Nouveau Mot de passe</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control" id="mdp" name="mdp" required >
		</div>
	  </div>
	  <div class="form-group row">
		<label for="mdpVerif" class="col-sm-2 col-form-label">Mot de passe vérification</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control" id="mdpVerif" name="mdpVerif" required >
		</div>
	  </div>
	  <div class="form-group row">
		<div class="col-sm-10">
		  <button type="submit" class="btn btn-primary">Modifier</button>
		</div>
	  </div>
	  <div class="form-group">
		<label for="msg">Vous allez devoir vous reconnectez suite au modification</label>
	  </div>
	</form>
</div>
<?php
$title = 'Modifier données';
$content = ob_get_clean();
include 'includes/layout.php';
?>

