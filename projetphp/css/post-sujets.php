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

	<div id="carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../assets/img/damso2.jpg" alt="damso">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/img/kayna2.jpg" alt="wallen">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/img/greenday.jpg" alt="pasdelamusique">
    </div>
  </div>

</div>

<div class="main-navbar text-center">
			<ul class="list-navbar">
				<li class="welcome"><span class="session-nav">Bienvenue </span>invite</li>
				<li><i class="fas fa-users"></i><a href="membres-list.php">Liste des Membres(admin)</a></li>
				<li><i class="fas fa-envelope"></i> <a href="private-message.php"> Messages Privés</a></li>
				<li><i class="fas fa-user-circle"></i><a href="profil.php">Profil</a></li>
				
			</ul>
		</div>
          
          <div class="sections-forum text-center">
       			<ul class="list-navbar">
				<li><a href="presentation.php"><figure><img class="img-fluid rounded" src="../assets/img/tupac.jpg" width="80"><figcaption>Presentation</figcaption></figure></a></li>
				<li><a href="partage.php"><figure><img class="img-fluid rounded" src="../assets/img/bobmarley2.jpg" width="80"><figcaption>Partage musical</figcaption></figure></a></li>
				<li><a href="creations.php"><figure><img class="img-fluid rounded" src="../assets/img/mj.jpg" width="80"><figcaption>Creations</figcaption></figure></a></li>	
			</ul>

          </div>

	</div>

	<div id="body-sujets">
		<div class="container">
		<div class="row">
			<div class=" col-sm-9 entetesujets">
			<button class="btn btn-primary" href="post-sujet.php">Nouveau Sujet</button>
		</div>
             <div class=" col-sm-3 text-right entetesujets">
			<span class="ml-auto">nombre de sujets </span> 
		</div>
		</div>
		</div>
	</div>


        <div class="list-sujets-forum">
	<div id="banner-title" class="main-navbar text-center">
	<h3>Nouveau Sujet</h3>	
		</div>
		  <table>
      <tr>
         <th colspan="2">Nouveau Topic</th>
      </tr>
      <tr>
         <td>Sujet</td>
         <td><input type="text" name="tsujet" size="70" maxlength="70" /></td>
      </tr>
      <tr>
         <td>Catégorie</td>
         <td>
            <select>
               <option>Catégorie 1</option>
               <option>Catégorie 2</option>
               <option>Catégorie 3</option>
               <option>Catégorie 1</option>
            </select>
         </td>
      </tr>
      <tr>
         <td>Sous-Catégorie</td>
         <td>
            <select>
               <option>Sous-Catégorie 1</option>
               <option>Sous-Catégorie 2</option>
               <option>Sous-Catégorie 3</option>
               <option>Sous-Catégorie 1</option>
            </select>
         </td>
      </tr>
      <tr>
         <td>Message</td>
         <td><textarea name="tcontenu"></textarea></td>
      </tr>
      <tr>
         <td>Me notifier des réponses par mail</td>
         <td><input type="checkbox" name="tmail" /></td>
      </tr>
      <tr>
         <td colspan="2"><input type="submit" name="tsubmit" value="Poster le Topic" /></td>
      </tr>
      <?php if(isset($terror)) { ?>
      <tr>
         <td colspan="2"><?= $terror ?></td>
      </tr>
      <?php } ?>
   </table>
</form>

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




</body>
