

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
 
if(isset($_POST["editpseudo"]) AND !empty($_POST['editpseudo']) AND $_POST["editpseudo"] != $_SESSION['pseudo']){

     $newpseudo = ($_POST['editpseudo']);
	$insertpseudo = $bdd->prepare("UPDATE membre SET pseudo = ? WHERE id_membre = ?");
	$insertpseudo ->execute(array($newpseudo, $_SESSION['id']));
	header("Location: profil.php?id=".$_SESSION['id']);
}

if(isset($_POST["editmail"]) AND !empty($_POST['editmail']) AND $_POST["editmail"] != $_SESSION['mail']){

     $newmail = ($_POST['editmail']);
	$insertmail = $bdd->prepare("UPDATE membre SET adresse_mail = ? WHERE id_membre = ?");
	$insertmail ->execute(array($newmail, $_SESSION['id']));
	header("Location: profil.php?id=".$_SESSION['id']);
}

if(isset($_POST["editpass"]) AND !empty($_POST['editpass'])){

     $newpass = ($_POST['editpass']);
	$insertpass = $bdd->prepare("UPDATE membre SET motDePasse = ? WHERE id_membre = ?");
	$insertpass ->execute(array($newpass, $_SESSION['id']));
	header("Location: profil.php?id=".$_SESSION['id']);
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
	<h3>Mon Profil</h3>	
		</div>
                 <form method="POST" action="">
                  <table class="table table-striped">
                    <tbody>

                      <tr>
                        <td>Pseudo:</td>
                        <td><input type="text" name="editpseudo" placeholder="pseudo" value="<?php echo $_SESSION['pseudo']; ?>"></td>
                      </tr>
                      <tr>
                        <td>Mot de passe:</td>
                        <td><input type="password" name="editpass" placeholder="mot de passe"></td>
                      </tr>
                      <tr>
                        <td>Mail</td>
                        <td><input type="email" name="editmail" placeholder="email" value="<?php echo $_SESSION['mail']; ?>"></td>
                      </tr>

                
                          
                     
                    </tbody>
                  </table>
  <input type="submit" value="mettre a jour le profil">
</form>


 <br>

<?php include"info.php"; ?>



</body>

