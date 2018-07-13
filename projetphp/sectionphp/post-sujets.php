<?php 

include_once "header.php";

?>

<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Liste des sujets</title>
	<link rel="stylesheet" href="../css/presentation.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">






</head>


          
          <div class="sections-forum text-center">
       			<ul class="list-navbar">
				<li><a href="presentation.php"><figure><img class="img-fluid rounded" src="../assets/img/tupac.jpg" width="80"><figcaption>Presentation</figcaption></figure></a></li>
				<li><a href="partage.php"><figure><img class="img-fluid rounded" src="../assets/img/bobmarley2.jpg" width="80"><figcaption>Partage musical</figcaption></figure></a></li>
				<li><a href="creations.php"><figure><img class="img-fluid rounded" src="../assets/img/mj.jpg" width="80"><figcaption>Creations</figcaption></figure></a></li>	
			</ul>

          </div>

	

	<div id="body-sujets">
		<div class="container">
		<div class="row">
			<div class=" col-sm-9 entetesujets">
			<button class="btn btn-primary" href="post-sujet.php">Nouveau Sujet</button>
		</div>

		</div>
		</div>
	</div>


        <div class="list-sujets-forum">
	<div id="banner-title" class="main-navbar text-center">
	<h3>Nouveau Sujet</h3>	
		</div>
		<form action="requete_sujet.php"method="POST">
		  <table class="table table-striped">
      <tr>
         <th colspan="2">Nouveau Topic</th>
      </tr>
      <tr>
         <td>Sujet</td>
         <td><input type="text" name="nom_sujet" size="50" maxlength="50" /></td>
      </tr>
      <tr>
         <td>Catégorie</td>
         <td>
            <select name='id_categorie'>
                
                <?php
                
                try
{
	$bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
                
               $categorie = $bdd->query('SELECT * from categorie ');
               while($donnees = $categorie->fetch()){
                   ?>
                <option value="<?php echo $donnees['id_categorie'];?>">
                    <?php 
                    echo $donnees['nom_categorie']; 
                    ?>
                </option>
                <?php 
               } 
                
                ?>
               
              
            </select>
         </td>
      </tr>
      <tr>
          <input type="hidden" name="id" value="$_SESSION['id']">
              </tr>
      <tr>
         <td colspan="2"><input type="submit" name="tsubmit" value="Poster le Topic" /></td>
      </tr>
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
