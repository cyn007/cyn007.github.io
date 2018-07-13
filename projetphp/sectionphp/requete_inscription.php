<?php 

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

             $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
           $pseudo = $_POST['pseudo'];
        $motDePasse = $_POST['motDePasse'];
      $adresse_mail = $_POST['adresse_mail'];
 $date_de_naissance = $_POST['date_de_naissance'];
             $admin = 0;
        $moderateur = 0;
                 
$inserer = $bdd->prepare('INSERT INTO membre(id_membre, nom, prenom, pseudo, motDePasse, adresse_mail, date_de_naissance, admin, moderateur) VALUES(id_membre, :nom, :prenom, :pseudo, :motDePasse, :adresse_mail, :date_de_naissance, :admin, :moderateur )');

$inserer->execute(array(
             'nom' => $nom,
           'prenom'=> $prenom,
           'pseudo'=> $pseudo,
       'motDePasse'=> $motDePasse,
     'adresse_mail'=> $adresse_mail,
'date_de_naissance'=> $date_de_naissance,
            'admin'=> $admin,
       'moderateur'=>$moderateur
));


 header('Location: connexion.php');
  exit();





?>