<?php 

include_once "header.php";

?>
<?php if(!isset($_SESSION['id'])) {
  
  header("Location: connexion.php");
}
?>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Profil</title>
	<link rel="stylesheet" href="../css/presentation.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">






</head>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
 


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
	<h3>Mon Profil</h3>	
		</div>

                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>Nom:</td>
                        <td><?php echo $_SESSION['nom']; ?></td>
                      </tr>
                      <tr>
                        <td>Prenom:</td>
                        <td><?php echo $_SESSION['prenom']; ?></td>
                      </tr>
                      <tr>
                        <td>Date de naissance</td>
                        <td><?php echo $_SESSION['date_de_naissance']; ?></td>
                      </tr>
                             <tr>
                        <td>Date d'inscription</td>
                        <td><?php echo $_SESSION['date_inscription']; ?></td>
                      </tr>
                        <tr>
                        <td>Statut</td>
                        <td><?php if(($_SESSION['admin'] === 1 )AND $_SESSION['moderateur'] === 0 ){
                          echo 'Administrateur';
                          }

                          else {
                            echo 'Membre';

                          } ?></td>
                      </tr> 
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php echo $_SESSION['mail']; ?>"><?php echo $_SESSION['mail']; ?></a></td>
                      </tr>
                       <tr>
                        <td>Actions</td>
                        <td><a href="message-prives.php">Ecrire un message privé </a> <br>
                          <a href="editer_profil.php">Editer mon profil </a>
                        </td>
                        
                      </tr>
                          
                     
                    </tbody>
                  </table>



 <br>

<?php include"info.php"; ?>



</body>
