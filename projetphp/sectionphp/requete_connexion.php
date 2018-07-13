<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', 'root');

if(isset($_POST['connexionform'])) {
   $pseudoconnect = htmlspecialchars($_POST['pseudo']);
   $mdpconnect = ($_POST['motDePasse']);
   if(!empty($pseudoconnect) AND !empty($mdpconnect)) {

      $requser = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ? AND motDePasse = ?");

      $requser->execute(array($pseudoconnect, $mdpconnect));

      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();

         $_SESSION['id'] = $userinfo['id_membre'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['adresse_mail'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['prenom'] = $userinfo['prenom'];
         $_SESSION['admin'] = $userinfo['admin'];
         $_SESSION['date_de_naissance'] = $userinfo['date_de_naissance'];
         $_SESSION['date_inscription'] = $userinfo['date_inscription'];
         $_SESSION['moderateur'] = $userinfo['moderateur'];
         
         header("Location: ../index.php?id=".$_SESSION['id']);
         
      } else {
         echo "Mauvais pseudo ou mot de passe !";
      }
   } else {
     echo "Tous les champs doivent être complétés !";
   }
}
?>