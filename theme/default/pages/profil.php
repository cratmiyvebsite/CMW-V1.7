<?php	$getprofil = $_GET['profil'];
?><header class="heading-pagination">
	<div class="container-fluid">
		<h1 class="text-uppercase wow fadeInRight" style="color:white;">Profil de <?php echo htmlspecialchars($getprofil); ?></h1>
	</div>
</header>
<section class="layout" id="page">
	<div class="container">
	<?php
	if(isset($_Joueur_) AND $_GET['profil'] == $_Joueur_['pseudo'])
	{
	?>	
			<h1 class="titre">Profil de <?php echo htmlspecialchars($getprofil); ?></h1>
			<div class="categories-edit">
						<ul class="nav nav-tabs" id="modifProfil">
							<li class="col-md-4 active"><a href="#infos" data-toggle="tab">Mes infos</a></li>
							<li class="col-md-4"><a href="#autres" data-toggle="tab">Autres</a></li>
							<li class="col-md-4"><a href="#serveur" data-toggle="tab">Donner des jetons</a></li>
						</ul>
					</div>
				<?php 
				if(isset($_GET['erreur']))
				{
					if($_GET['erreur'] == 1)
						echo '<div class="alert alert-danger"><center>Erreur, l\'email rentré est vide</center></div>';
					elseif($_GET['erreur'] == 2)
						echo '<div class="alert alert-danger"><center>Erreur, un des champs est trop court ( < à 4caractères)</center></div>';
					elseif($_GET['erreur'] == 3)
						echo '<div class="alert alert-danger"><center>Erreur, le mot de passe rentré ne correspond pas à celui associé à votre compte</center></div>';
					elseif($_GET['erreur'] == 4)
						echo '<div class="alert alert-danger"><center>Vous n\'avez pas assez de tokens :( </center></div>';
					elseif($_GET['erreur'] == 5)
						echo '<div class="alert alert-danger"><center>Pseudo inconnu ... </center></div>';
					elseif($_GET['erreur'] == 6)
						echo '<div class="alert alert-danger"><center>Extension non autorisée !</center></div>';
					elseif($_GET['erreur'] == 7)
						echo '<div class="alert alert-danger"><center>Fichier trop volumineux ! Maximum 2Mo</center></div>';
					elseif($_GET['erreur'] == 8)
						echo '<div class="alert alert-danger"><center>Des champs sont manquants !</center></div>';
					else
						echo '<div class="alert alert-danger"><center>Erreur indéterminé</center></div>';
				}
				elseif (isset($_GET['success'])) {
					if($_GET['success'] == 'true')
						echo '<div class="alert alert-success"><center>Vos informations ont bien été changé ! :)</center></div>';
					elseif($_GET['success'] == "jetons")
						echo '<div class="alert alert-success"><center>Vous venez d\'envoyer '.htmlspecialchars($_GET['montant']).' jetons à '.htmlspecialchars($_GET['pseudo']).'</center></div>';
					elseif($_GET['success'] == "image")
						echo '<div class="alert alert-success"><center>Votre photo de profil a été modifiée :D</center></div>';
					elseif($_GET['success'] == "imageRemoved")
						echo '<div class="alert alert-success"><center>Votre photo de profil a été supprimée de nos serveurs.</center></div>';
				}
				?>
				<div class="tab-content">
					<div class="tab-pane active" id="infos">
					
					<h3 class="header-bloc header-form">Général</h3>

					<form class="form-horizontal" method="post" action="?&action=changeProfil" role="form">
						

						<div class="form-group">
							<div class="row">
								<label for="pseudo" class="col-md-4 control-label">Pseudo</label>
								<div class="col-md-6">
									<p class="form-control-static"><?php echo $_Joueur_['pseudo']; ?></p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">Mot de Passe</label>
								<div class="col-md-6 changer-mdp-champ">
									<input type="password" class="form-control" name="mdpAncien" placeholder="Ancien Mot de Passe">
								</div>
							</div>
							<div class="row">
								<label class="col-md-4 control-label">Nouveau</label>
								<div class="col-md-6 changer-mdp-champ">
									<input type="password" class="form-control" name="mdpNouveau" placeholder="Nouveau Mot de Passe">
								</div>
							</div>
							<div class="row">
								<label class="col-md-4 control-label">Confirmation</label>
								<div class="col-md-6 changer-mdp-champ">
									<input type="password" class="form-control" name="mdpConfirme" placeholder="Confirmez-le">
								</div>
							</div>
						</div>
					  <div class="form-group">
						<div class="row">
							<label for="inputPassword3" class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
							  <input type="email" class="form-control" id="inputPassword3" name="email" value="<?php echo $joueurDonnees['email']; ?>">
							</div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="row">
							<div class="col-md-offset-5 col-md-5">
							  <button type="submit" class="btn btn-primary validerChange">Valider mes changements</button>
							</div>
						</div>
					  </div>
					</form>
					<div class="row">
						<div class="col-md-8">
							<p>Votre email est actuellement <span style="font-weight: bold;"><?php if($joueurDonnees['show_email'] == 0) echo 'visible Publiquement'; else echo 'Privée'; ?></span></p>
						</div>
						<div class="col-md-4">
							<a href="?action=modifShowEmail&actuel=<?=$joueurDonnees['show_email'];?>" class="btn btn-warning">Permuter la visibilitée</a>
						</div>
					</div>		


					</div>
					<div class="tab-pane" id="autres">

						<h3 class="header-bloc header-form">Autres données personnelles</h3>

						<form class="form-horizontal" method="post" action="?&action=changeProfilAutres" role="form">
							

							<div class="form-group">
								<label for="pseudo" class="col-sm-4 control-label">Skype</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="skype" placeholder="Votre nom d'utilisateur Skype" value="<?php if($joueurDonnees['skype'] != 'inconnu') echo $joueurDonnees['skype']; ?>">
								</div>
							</div>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-4 control-label">Age</label>
						    <div class="col-sm-6">
						      <input type="number" name="age"class="form-control" placeholder="17" value="<?php if($joueurDonnees['age'] != 'inconnu') echo $joueurDonnees['age']; ?>" >
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-5 col-sm-5">
						      <button type="submit" class="btn btn-primary validerChange">Valider champs facultatifs</button>
						    </div>
						  </div>
						</form>			
		
					</div>
					<div class="tab-pane" id="serveur">
						<h3 class="header-bloc header-form">Donner des jetons</h3>
						<form class="form-horizontal" method="post" action="?&action=give_jetons" role="form">
							

							<div class="form-group">
								<label for="pseudo" class="col-sm-4 control-label">Pseudo du receveur</label>
								<div class="col-sm-6">
									<input type="text" required class="form-control" name="pseudo" placeholder="Le nom de la personne a qui vous souhaiter donner des jetons" id="pseudo">
								</div>
							</div>
						  <div class="form-group">
						    <label for="montant" class="col-sm-4 control-label">Montant</label>
						    <div class="col-sm-6">
						      <input type="number" required name="montant" class="form-control" placeholder="0" />
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-5 col-sm-5">
						      <button type="submit" class="btn btn-primary validerChange">Envoyer</button>
						    </div>
						  </div>
						</form>	
					</div>
					<hr>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h3 class="header-bloc header-form">Modifier sa photo de profil</h3>
						<form class="form-horizontal" method="post" action="?action=modifImgProfil" role="form" enctype="multipart/form-data">
							<div class="form-group">
								<label for="img-profil" class="control-label">Importer votre image (< 1Mo, jpeg, jpg, png, bmp, ico, gif)</label>
								<input type="file" name="img_profil" required class="form-control-file" id="img-profil">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success">Envoyer</button>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<h3 class="header-bloc">Photo de profil actuelle</h3>
						<?php
						$Img = new ImgProfil($_Joueur_['id']);
						echo "<center><img src='".$Img->getImgToSize(128, $width, $height)."' style='width: ".$width."px; height: ".$height."px;' alt='Profil' /></center>";
						if($Img->modif)
						{
							echo '<center><a class="btn btn-danger" style="margin-top: 10px;" href="?action=removeImgProfil">Supprimer</a></center>';
						}
						?>
					</div>
				</div>
				<hr/>

	<?php
	}
	?>
<div class="panel panel-default">
  <div class="panel-body">
		<div class="row">
			<div class="col-md-6 unite-bloc">
				<h3 class="header-bloc">Statistiques</h3>
				<div class="corp-bloc profil-bloc">
					<table class="table">
						<tr>
							<td>Status</td>
							<td><?php echo $serveurProfil['status']; ?></td>
						</tr>
						<tr>
							<td>Age</td>
							<td><?php echo $joueurDonnees['age']; ?> ans.</td>
						</tr>
						<tr>
							<td>Pseudo</td>
							<td><?php echo htmlspecialchars($getprofil); ?></td>
						</tr>
						<tr>
							<td>Grade Site</td>
							<td><?php echo $gradeSite; ?></td>
						</tr>
						<tr>
							<td>Inscription</td>
							<td><?php echo 'Le '.date('d/m/Y', $joueurDonnees['anciennete']).' &agrave; '.date('H:i:s', $joueurDonnees['anciennete']); ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php if($joueurDonnees['show_email'] == 0)
								echo $joueurDonnees['email'];
							else
								echo 'inconnue'; ?></td>
						</tr>
						<tr>
							<td>Skype</td>
							<td><?php echo $joueurDonnees['skype']; ?></td>
						</tr>
						<tr>
							<td># votes</td>
							<td>
								<?php require_once("modele/topVotes.class.php");
								$nbreVotes = new TopVotes($bddConnection);
								echo $nbreVotes->getNbreVotes($getprofil);?>
							</td>
						</tr>
					</table>
				</div>
				<div class="footer-bloc">
				</div>
			</div>
			<div class="col-md-6 unite-bloc">
				<h3 class="header-bloc"><?php echo htmlspecialchars($getprofil); ?></h3>
					<?php 
					$Img = new ImgProfil($joueurDonnees['id']);
					?>
					<img src="<?=$Img->getImgToSize(128, $width, $height);?>" style="width: <?=$width;?>px; height: <?=$height;?>px;" alt="<?=htmlspecialchars($getprofil);?>" />
					<img src="https://minotar.net/body/<?php echo htmlspecialchars($getprofil); ?>/200.png" style="padding-left: 30%;" alt="none" />
				<div class="footer-bloc">
				</div>
			</div>
		</div>
  </div>
</div>
<script>
  $(function () {
    $('#modifProfil a:first').tab('show')
  })
</script>
</div></section>