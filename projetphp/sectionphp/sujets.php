<?php 

include_once "navbar.php";

?>

<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Liste des sujets</title>
	<link rel="stylesheet" href="../css/sujets.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">






</head>

<body class="container">
	<div id="page-header">
		<div class="main-logo text-center">
			<a href="index.php"><h1>CZA FORUM </h1></a>
		</div>

		<div class="main-navbar text-center">
			<ul class="list-navbar">
				<li class="session-nav">Bienvenue invite</li>
				<li><a href="membres-list.php">Liste des Membres(admin)</a></li>
				<li><a href="private-message.php">Messages Privés</a></li>
				<li><a href="profil.php">Profil</a></li>
				
			</ul>
		</div>
          
          <div class="sections-forum text-center">
       			<ul class="list-navbar">
				<li><a href="presentation.php">Presentation</a></li>
				<li><a href="partage.php">Partage Musicale</a></li>
				<li><a href="crearion.php">Creation</a></li>		
			</ul>

          </div>

	</div>

	<div id="body-sujets">
		<div class="container">
		<div class="row">
			<button class="btn btn-primary" href="post-sujet.php">Nouveau Sujet</button>
			<span class="ml-auto">nombre de sujets   </span> <p>  /pagination </p>
		</div>


        <div class="list-sujets-forum">
		<div class="titre-forum text-center">
			<h3> Titre du forum </h3>
		</div>
		  <table class="table table-striped">
    <thead>
      <tr>
        <th>Liste des sujets</th>
        <th>Reponses</th>
        <th>Dernier message</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a class="membre-sujet" href="">[membres]</a><a class="nom-sujet" href=""><b>Bienvenue dans la page presentation</b></a>
        <p class="date-sujet">le 28/06/2018 </p>

        </td>
        <td><span class="nbdereponses">90</span> 
        	<span style="color:grey;">reponses</span></td>
        <td>
        par<a class="membre-sujet" href="">[membres]</a>
        <p class="date-sujet">le 28/06/2018 </p>
</td>
      </tr>
            <tr>
        <td><a class="membre-sujet" href="">[membres]</a><a class="nom-sujet" href=""><b>Bienvenue dans la page presentation</b></a>
        <p class="date-sujet">le 28/06/2018 </p>

        </td>
        <td><span class="nbdereponses">90</span> 
        	<span style="color:grey;">reponses</span></td>
        <td>
        par<a class="membre-sujet" href="">[membres]</a>
        <p class="date-sujet">le 28/06/2018 </p>
</td>
      </tr>
    </tbody>
  </table>

 </div>
	</div>
</div>



</body>
