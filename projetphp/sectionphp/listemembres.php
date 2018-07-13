<?php 

include_once "header.php";

?>
<?php if(!isset($_SESSION['id'])) {
  
  header("Location: connexion.php");
}
else if($_SESSION['id'] != 5  ){
  echo "Pas l'autorisation desole";


} else {

?>




<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Liste des membres</title>
	<link rel="stylesheet" href="../css/presentation.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">






</head>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));

if(isset($_GET['admin']) AND !empty($_GET['admin'])) {
      $admin = (int) $_GET['admin'];
      $req = $bdd->prepare('UPDATE membre SET admin = 1 WHERE id_membre = ?');
      $req->execute(array($admin));
   }


      if(isset($_GET['noadmin']) AND !empty($_GET['noadmin'])) {
      $noadmin = (int) $_GET['noadmin'];
      $req = $bdd->prepare('UPDATE membre SET admin = 0 WHERE id_membre = ?');
      $req->execute(array($noadmin));
   }


   if(isset($_GET['moderateur']) AND !empty($_GET['moderateur'])) {
      $moderateur = (int) $_GET['moderateur'];
      $req = $bdd->prepare('UPDATE membre SET moderateur = 1 WHERE id_membre = ?');
      $req->execute(array($moderateur));
   }

      if(isset($_GET['nomoderateur']) AND !empty($_GET['nomoderateur'])) {
      $nomoderateur = (int) $_GET['nomoderateur'];
      $req = $bdd->prepare('UPDATE membre SET moderateur = 0 WHERE id_membre = ?');
      $req->execute(array($nomoderateur));
   }




 if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM membre WHERE id_membre = ?');
      $req->execute(array($supprime));
   }
?>


          <div class="sections-forum text-center">
       			<ul class="list-navbar">
				<li><a href="presentation.php"><figure><img class="img-fluid rounded" src="../assets/img/tupac.jpg" width="80"><figcaption>Presentation</figcaption></figure></a></li>
				<li><a href="partage.php"><figure><img class="img-fluid rounded" src="../assets/img/bobmarley2.jpg" width="80"><figcaption>Partage musical</figcaption></figure></a></li>
				<li><a href="creations.php"><figure><img class="img-fluid rounded" src="../assets/img/mj.jpg" width="80"><figcaption>Creations</figcaption></figure></a></li>	
			</ul>

          </div>
<br>


        <div class="list-sujets-forum">
	<div id="banner-title" class="main-navbar text-center">
	<h3>Liste des membres</h3>	
		</div>

<table class="table table-striped">
      <thead style="background-color: orange;">
        <tr>
          <th>#</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>DDI</th>
          <th>Pseudo</th>
          <th>Email</th>
          <th>Type</th>
          <th>Compte</th>
         
        </tr>
      </thead>
<?php
      $membres = $bdd->query('SELECT * FROM membre');
      while ($m = $membres->fetch()){


      ?>
      <tbody ">
        <tr>
          <td><?= $m['id_membre']; ?></td>
          <td><?= $m['nom']; ?></td>
          <td><?= $m['prenom']; ?></td>
          <td><?= $m['date_inscription']; ?></td>
          <td><?= $m['pseudo']; ?></td>
          <td><?= $m['adresse_mail']; ?></td>
          <td>
          	<?php if($m['admin']==0 AND $m['moderateur']==0 ){ 
          		echo "Membre";
          	} 
            else if ($m['admin']==0 AND $m['moderateur']==1 ){
            	echo "Moderateur";
            }
          	else {
          		echo 'Admin';
          	} ?>


          <td>
            <a href="listemembres.php?supprime=<?= $m['id_membre'] ?>">Supprimer le compte</a><br/>
 <?php if($m['admin'] == 0){ ?>

  <a href="listemembres.php?admin=<?= $m['id_membre'] ?>">Devenir admin</a> 

<br>
    
  <?php } ?>
   <?php if($m['admin'] == 1){ ?>

  <a href="listemembres.php?noadmin=<?= $m['id_membre'] ?>">Supprimer admin</a>
    <br>
  <?php } ?>
           <?php if($m['moderateur'] == 0){ ?>

  <a href="listemembres.php?moderateur=<?= $m['id_membre'] ?>">Devenir moderateur</a> 


    
  <?php } ?>
   <?php if($m['moderateur'] == 1){ ?>

  <a href="listemembres.php?nomoderateur=<?= $m['id_membre'] ?>">Supprimer moderateur</a>
    
  <?php } ?>
          </td>
        </tr>
        
        <?php


   
           }
       
       ?>
</td>
</tr>
</tbody>
</table>



 </div>
 <br>
 <br>
 <br>
<?php include"info.php"; ?>


<?php } ?>

</body>
