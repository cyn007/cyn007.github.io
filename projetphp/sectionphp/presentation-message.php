<?php 

include_once "header.php";

?>

<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Liste-messages</title>
	<link rel="stylesheet" href="../css/presentation-message.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">






</head>


<body>

		<div id="body-message">
		<div class="container">
		<div class="row">
			<div class=" col-sm-9 entetemessage">
			 <a href="#post-message" class="nouveau">Poster un message</a>
		</div>

		</div>
		</div>
	</div>

	<div class="list-sujets-forum">
	<div id="banner-title" class="main-navbar text-center">
	<h3><?php echo $_GET['titre_sujet'] ?></h3>	
		</div>
		  <table class="table table-striped">
    <thead>
      <tr>

        <th class="table-membres">Membres</th>
        <th class="table-messages">Messages</th>
      </tr>
    </thead>
    <tbody>
       <?php  
                  
                  try
{
  $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
                  
                  $messages = $bdd->query('SELECT * FROM message INNER JOIN sujet ON sujet.id_sujet = message.id_sujet INNER JOIN membre ON membre.id_membre = message.id_membre WHERE message.id_sujet = '.$_GET['numero_du_sujet'].' ');
                  
                  while($donnees = $messages->fetch()){
                  ?>
      <tr>
        <td class="text-center">
        	<img src="../assets/img/imusic.png" width="100">
        	<p class="membres" href=""><?= $donnees['pseudo']; ?></p>
        
        <p class="date-inscription"><b>Inscrit depuis le</b> <?= $donnees['date_inscription']; ?> </p>

        </td>
        <td>
      <p class="content-mess"><?= $donnees['corp_message']; ?></p>
</td>
      </tr>

         <?php } ?>

    </tbody>
  </table>
         <div id="post-message">
	<div id="banner-title" class="main-navbar text-center">
	<h3 >Nouveau message</h3>	
		</div>





		<form action="requete_message.php?numero_du_sujet=<?php echo $_GET['numero_du_sujet']; ?>"method="POST">
		  <table class="table table-striped">
      <tr>
         <th colspan="2">Nouveau Message</th>
      </tr>

         <td>Message</td>
         <td><textarea name="corp_message"></textarea></td>
      </tr>
      
      <tr>
         <td colspan="2"><input type="submit" name="msubmit" value="Poster le Message" /></td>
      </tr>
   </table>
</form>

 </div>
   </div>

		<?php include"info.php"; ?>
</body>
</html>