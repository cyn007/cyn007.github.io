


<?php 

include_once "header.php";

?>
<?php if(!isset($_SESSION['id'])) {
  header("Location: connexion.php");
}

?>
<?php 
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
  $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
  $msg = $bdd->prepare('SELECT * FROM message_prive WHERE id_destinataire = ?');
  $msg->execute(array($_SESSION['id']));
  $msg_nbr = $msg->rowCount();
  ?>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Boite de reception</title>
	<link rel="stylesheet" href="../css/presentation-message.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">






</head>




		<div id="body-message">
		<div class="container">
		<div class="row">


		</div>
		</div>
	</div>

	<div class="list-sujets-forum">
	<div id="banner-title" class="main-navbar text-center">
	<h3>Mes messages privés</h3>	
		</div>

		  <table class="table table-striped">
    <thead>
      <tr>

        <th class="table-membres">Membres</th>
        <th class="table-messages">Messages</th>
      </tr>
    </thead>
        <?php
   if($msg_nbr == 0) { echo "Vous n'avez aucun message..."; } else {
   while($m = $msg->fetch()) {
       $p_exp = $bdd->prepare('SELECT pseudo FROM membre WHERE id_membre = ?');
      $p_exp->execute(array($m['id_expediteur']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['pseudo'];
   ?> 
    <tbody>
      <tr>
        <td class="text-center">
        	<img src="../assets/img/imusic.png" width="100">
        	<p class="membres" href=""><?= $p_exp ?></p>
      

        </td>
        <td>
      <p class="content-mess"><?= nl2br($m['message']) ?></p>
</td>
      </tr>

        <?php  } }
   ?>     

    </tbody>
  </table>
       
	<?php include"info.php"; ?>
	</div>
 
  <?php } ?>