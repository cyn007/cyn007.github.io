
<?php session_start(); ?>
<?php 

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>


<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Anton|Arvo|Cinzel|Fjalla+One|Lobster|Pacifico|Patua+One|Righteous|Ultra|Vidaloka" rel="stylesheet"> 

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>

<body class="container">
      <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand " href="#"><img src="assets/img/cza2.png"></a>
        <button class="navbar-toggler navbar-toggler-right order-lg-0 order-1" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end order-lg-1 order-last" id="navbarNavDropdown">
          <ul class="navbar-nav">
                 <?php if(!isset($_SESSION['id'])) {
              ?>
            <li class="nav-item"><a class="nav-link pr-3" href="sectionphp/connexion.php"><i class="fas fa-user-circle"></i>Connexion</a></li>
            <li class="nav-item"><a class="nav-link pr-3" href="sectionphp/inscription.php"><i class="fas fa-pencil-alt"></i>Inscription</a></li>
            <?php } else { ?>
              <li class="nav-item"><a class="nav-link pr-3" href="sectionphp/deconnexion.php"><i class="fas fa-sign-out-alt"></i>Deconnexion</a></li>
           <?php } ?>
          </ul>
        </div>
      </nav>

<div id="carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/damso2.jpg" alt="damso">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/kayna2.jpg" alt="wallen">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/greenday.jpg" alt="pasdelamusique">
    </div>
  </div>

</div>


<div class="main-navbar text-center">
			<ul class="list-navbar">
				<li class="welcome"><span class="session-nav">Bienvenue </span><?php if(isset($_SESSION['id'])) {
              echo $_SESSION['pseudo']; } else { echo "invite"; } ?> </li>
				<li><i class="fas fa-users"></i><a href="sectionphp/listemembres.php">Liste des Membres</a></li>
				<li><i class="fas fa-envelope"></i> <a href="sectionphp/boite-reception.php"> Boite de reception</a></li>
				<li><i class="fas fa-user-circle"></i><a href="sectionphp/profil.php">Profil</a></li>
				
			</ul>
		</div>
	<div class="forum-music" >
		<img id="img-music" class="img-fluid" src="assets/img/forummusic.jpg">
		 <div class="les-forums">
	<div class="row">


		<div class="col-sm-4 categories">
			<img id="img-presentation" class="img-fluid" src="assets/img/tupac.jpg">
			<div class="caption text-center"><a href="sectionphp/presentation.php"> <h3>PRESENTATION</h3> </a>
		<div class="nb-content">
			<span class="nbdesujets">1 </span><span>sujets</span> / <span class="nbdemessages">0 messages</span>
		</div>
			</div>
		</div>
			<div class="col-sm-4 categories">
			<img id="img-partage" class="img-fluid" src="assets/img/bobmarley2.jpg">
			<div class="caption text-center"><a href="sectionphp/partage_musical.php"> <h3>PARTAGE MUSICAL</h3> </a>
				<div class="nb-content">
<span class="nbdesujets">0 </span><span>sujets</span> / <span class="nbdemessages">0 messages</span>
</div>
			</div>
		</div>
				<div class="col-sm-4 categories">
			<img id="img-creation" class="img-fluid" src="assets/img/mj.jpg" >
						<div class="caption text-center"><a href="sectionphp/creations.php"> <h3>CREATIONS</h3> </a>
							<div class="nb-content">
<span class="nbdesujets">0 </span><span>sujets</span> / <span class="nbdemessages">0 messages</span>
</div>
			</div>
		</div>
	 </div>
	</div>
	</div>
 
	<div id="infos" class="main-navbar text-center">
	<h3><i class="far fa-edit"></i>Informations</h3>	
		</div>
	<div id="content-infos" >
		<h6><i class="fas fa-calculator"></i>Statistiques</h6>
		<br>
		<div class="row">
		<div class="col-sm-4">
		<span class="nbde"> Nombre total de visites : </span> <span>1708</span>
		<br>
		<span class="nbde"> Nombre total de messages : </span> <span>188</span>
		<br>
		<span class="nbde"> Nombre total de sujets : </span> <span>48</span>
		<br>
		<span class="nbde"> Nombre total de membres : </span> <span>10</span>
		<br>
	</div>
	    <div id="socialmedia" class="col-sm-8 text-center">
		<i class="fab fa-facebook"></i> <i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i> <i class="fab fa-github"></i>
          </div>
      </div>

	</div>


<script >
	 $(document).ready(function(){

	$( ".forum-music" ).mouseenter(function() {
  $( "#img-music" ).addClass('animated fadeOut');
  $( ".les-forums" ).addClass('animated fadeInLeft');
  $( ".les-forums" ).css('display','block'); 
});




});
</script>


</body>

<footer>
	<p align="right"> &copy; Cynthia Zaïd Alexandre </p>
	</footer>