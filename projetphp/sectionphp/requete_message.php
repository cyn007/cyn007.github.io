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


         $message = $_POST['corp_message'];  
         $sujet = $_GET['numero_du_sujet'];
         $membre = $_SESSION['id'];

var_dump($message);
var_dump($sujet);
var_dump($membre);

$inserermessage = $bdd->prepare('INSERT INTO message (corp_message, id_sujet, id_membre  ) VALUES(:corp_message, :id_sujet, :id_membre)');

$inserermessage->execute(array(
        'corp_message' => $message,
             'id_sujet'=> $sujet,
           'id_membre' => $membre
        
));

 header('Location: ' . $_SERVER['HTTP_REFERER'] );
  exit();


 /*header('Location: presentation_message.php');
  exit();*/

?>