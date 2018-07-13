<?php 
	include "navbar.php";
?>

<head>
	<meta charset="UTF-8">
	<title>Page de connexion</title>
	<link rel="stylesheet" href="../css/connexion.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<!-- chargement de ngMessages -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular-messages.min.js"></script>

	<!-- Chargement de notre application AngularJS -->
	<script src="../js/form-angular.js"></script>





</head>

<body  ng-app="app" ng-controller="appController as vm" class="container">


	<div id="connexion-content">

		
		<div id="colgauche" class="col-sm-6">

			<div class="login animated slideInLeft text-center">   



				<h1> CONNEXION </h1>

				<!-- FORMULAIRE -->

				<form id="login" action="requete_connexion.php" method ="POST" name="login" novalidate autocomplete="off">

					<div class="form-element">
						<span><i class="fas fa-user"></i></span><input type="text" placeholder="Pseudo" name="pseudo" ng-model="vm.pseudo" required >
					</div>
					<div class="erreur" ng-messages="login.pseudo.$error" ng-show="login.pseudo.$touched">
						<p class="erreur" ng-message="required">Ce champ est obligatoire.</p>
					</div>

										<div class="form-element">
						<span><i class="fas fa-lock"></i></span><input type="password" placeholder="Mot de passe" name="motDePasse" ng-model ="vm.password" minlength="4" required/>
					</div>

					<div class="erreur" ng-messages="login.motDePasse.$error" ng-show="login.motDePasse.$touched">
						<p class="erreur" ng-message="required">Ce champ est obligatoire.</p>
						<p class="erreur" ng-message="minlength">Le nom doit contenir au minimum 4 caractères.</p>
					</div>

					<button name="connexionform" type="submit" class="btn-connexion" ng-disabled="login.$invalid">Se connecter</button>



             </form>
            </div>
</div>
</div>
<?php include"info.php"; ?>


</body>