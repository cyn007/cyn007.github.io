<?php 

include_once "header.php";

?>

<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Message Prives</title>
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

		</div>
		</div>
	</div>
  <?php 
  $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));

if(isset($_POST['mpsubmit'])) {
      if(isset($_POST['destinataire'],$_POST['mcontenu']) AND !empty($_POST['destinataire']) AND !empty($_POST['mcontenu'])) {
         $destinataire = ($_POST['destinataire']);
         $message = ($_POST['mcontenu']);
         $id_destinataire = $bdd->prepare('SELECT id_membre FROM membre WHERE pseudo = ?');
         $id_destinataire->execute(array($destinataire));
         $dest_exist = $id_destinataire->rowCount();
         if($dest_exist == 1) {
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire['id_membre'];
            $ins = $bdd->prepare('INSERT INTO message_prive(id_expediteur,id_destinataire,message) VALUES (?,?,?)');
            $ins->execute(array($_SESSION['id'],$id_destinataire,$message));
            $error = "Votre message a bien été envoyé !";
         } else {
            $error = "Cet utilisateur n'existe pas...";
         }
      } else {
         $error = "Veuillez compléter tous les champs";
      }
   }
   $destinataires = $bdd->query('SELECT pseudo FROM membre ORDER BY pseudo');?>
        <div class="list-sujets-forum">
	<div id="banner-title" class="main-navbar text-center">
	<h3>Nouveau Message prive</h3>	
		</div>
		<form action=""method="POST">
		  <table class="table table-striped">
      <tr>
         <th colspan="2">Nouveau Message</th>
      </tr>
      <tr>
	     <select name="destinataire">
	     	<?php while($d = $destinataires->fetch()) { ?>
	     	<option><?= $d['pseudo'] ?></option>
	     <?php } ?>
	     </select>
      </tr>
<tr>
         <td>Message</td>
         <td><textarea name="mcontenu"></textarea></td>
      </tr>
     
      <tr>
         <td colspan="2"><input type="submit" name="mpsubmit" value="Envoyez le Message" /></td>
      </tr>
   </table>
</form>

<?php if(isset($erreur)) { echo $erreur; } ?>

 </div>
		<?php include"info.php"; ?>


</body>
