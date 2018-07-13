<?php
session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


         $sujet = $_POST['nom_sujet'];  
         $categorie = $_POST['id_categorie'];
         $membre = $_SESSION['id'];

var_dump($categorie);
var_dump($sujet);
var_dump($membre);

$inserer = $bdd->prepare('INSERT INTO sujet (nom_sujet, id_membre,  id_categorie) VALUES(  :nom_sujet, :id_membre, :id_categorie)');

$inserer->execute(array(
        'nom_sujet' => $sujet,   
        'id_membre' => $membre,
        'id_categorie'=> $categorie 
));



 header('Location: index.php');
  exit();

?>