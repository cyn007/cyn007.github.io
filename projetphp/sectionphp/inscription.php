<?php 

include "navbar.php";

?>

<head>
	<meta charset="UTF-8">
	<title>Page d'inscription</title>
	<link rel="stylesheet" href="../css/inscription.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<!-- chargement de ngMessages -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular-messages.min.js"></script>

	<!-- Chargement de notre application AngularJS -->
	<script src="../js/form-angular.js"></script>





</head>

<body  ng-app="app" ng-controller="appController as vm" class="container">
	<div id="inscription-content">

				<div id="coldroite"class="col-sm-6 offset-sm-6">

			<div class="register animated slideInRight text-center">   



				<h1> INSCRIPTION </h1>

				<!-- FORMULAIRE -->

				<form id="formulaire" action="requete_inscription.php" method ="POST" name="inscription" novalidate autocomplete="off">

					<div class="form-element">
						<span><i class="fas fa-id-card"></i></span><input type="text" placeholder="Nom" name="nom" ng-model="vm.nom" required ng-minlength="2" ng-maxlength="15">

					</div>
					<div class="erreur" ng-messages="inscription.nom.$error" ng-show="inscription.nom.$touched">
						<p class="erreur" ng-message="required">Ce champ est obligatoire.</p>
						<p class="erreur" ng-message="minlength">Le nom doit contenir au minimum 2 caractères.</p>
						<p class="erreur" ng-message="maxlength">Le nom doit contenir au maximum 15 caractères.</p>
					</div>

					<div class="form-element">
						<span><i class="fas fa-id-card"></i></span><input type="text" placeholder="Prenom" name="prenom" ng-model="vm.prenom" required ng-minlength="2" ng-maxlength="15">
					</div>
					<div class="erreur" ng-messages="inscription.prenom.$error" ng-show="inscription.prenom.$touched">
						<p class="erreur" ng-message="required">Ce champ est obligatoire.</p>
						<p class="erreur" ng-message="minlength">Le prenom doit contenir au minimum 2 caractères.</p>
						<p class="erreur" ng-message="maxlength">Le prenom doit contenir au maximum 15 caractères.</p>
					</div>

					<div class="form-element">
						<span><i class="fas fa-user"></i></span><input type="text" placeholder="Pseudo" name="pseudo" ng-model="vm.pseudo" required ng-minlength="2" ng-maxlength="15">
					</div>
					<div class="erreur" ng-messages="inscription.pseudo.$error" ng-show="inscription.pseudo.$touched">
						<p class="erreur" ng-message="required">Ce champ est obligatoire.</p>
						<p class="erreur" ng-message="minlength">Le pseudo doit contenir au minimum 2 caractères.</p>
						<p class="erreur" ng-message="maxlength">Le pseudo doit contenir au maximum 15 caractères.</p>
					</div>

					<div class="form-element">
						<span><i class="fas fa-lock"></i></span><input type="password" placeholder="Mot de passe" name="motDePasse" ng-model ="vm.password"minlength="4" />
					</div>

					<div class="erreur" ng-messages="inscription.password.$error" ng-show="inscription.password.$touched">
						<p class="erreur" ng-message="required">Ce champ est obligatoire.</p>
						<p class="erreur" ng-message="minlength">Le nom doit contenir au minimum 4 caractères.</p>
					</div>


					<div class="form-element">
						<span><i class="fas fa-envelope"></i></span><input type="email" placeholder="Adresse Email" name="adresse_mail" ng-model="vm.email" required/>
					</div>
					<div class="erreur" ng-messages="inscription.email.$error" ng-show="inscription.email.$touched">
						<p class="erreur" ng-message="required">Ce champ est obligatoire.</p>
						<p ng-message="email">Un email valide est obligatoire.</p>
					</div>

					<div class="form-element">
						<span><i class="fas fa-birthday-cake"></i></span><input type="date" placeholder="Date de naissance" ng-model="vm.bday" name="date_de_naissance" required>
					</div>
					<div class="erreur" ng-messages="inscription.bday.$error" ng-show="inscription.bday.$touched">
						<p class="erreur" ng-message="required">Ce champ est obligatoire.</p>
					</div>

					
					<button type="submit" class="btn-register" ng-disabled="inscription.$invalid">S'inscrire</button>
				</form>

				<!-- FIN DU FORMULAIRE -->
			</div>

		</div>
	</div>

<?php include"info.php"; ?>

</body>