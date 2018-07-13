<?php session_start(); ?>


<html lang="fr">
<head>
  <meta charset="UTF-8">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Anton|Arvo|Cinzel|Fjalla+One|Lobster|Pacifico|Patua+One|Righteous|Ultra|Vidaloka" rel="stylesheet"> 

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>

<body class="container" >
     <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand " href="../index.php"><img src="../assets/img/cza2.png"></a>
        <button class="navbar-toggler navbar-toggler-right order-lg-0 order-1" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end order-lg-1 order-last" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <?php if(!isset($_SESSION['id'])) {
              ?>
            <li class="nav-item"><a class="nav-link pr-3" href="connexion.php"><i class="fas fa-user-circle"></i>Connexion</a></li>
            <li class="nav-item"><a class="nav-link pr-3" href="inscription.php"><i class="fas fa-pencil-alt"></i>Inscription</a></li>
            <?php } else { ?>
              <li class="nav-item"><a class="nav-link pr-3" href="deconnexion.php"><i class="fas fa-sign-out-alt"></i>Deconnexion</a></li>
           <?php } ?>
          </ul>
        </div>
      </nav>


  <div id="page-header">

  <div id="carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../assets/img/damso2.jpg" alt="damso">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/img/kayna2.jpg" alt="wallen">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/img/greenday.jpg" alt="pasdelamusique">
    </div>
  </div>

</div>

<div class="main-navbar text-center">
      <ul class="list-navbar">
        <li class="welcome"><span class="session-nav">Bienvenue <?php if(isset($_SESSION['id'])) {
              echo $_SESSION['pseudo']; } else { echo "invite"; } ?></li>
        <li><i class="fas fa-users"></i><a href="listemembres.php">Liste des Membres</a></li>
        <li><i class="fas fa-envelope"></i> <a href="boite-reception.php"> Boite de Reception</a></li>
        <li><i class="fas fa-user-circle"></i><a href="profil.php">Profil</a></li>
        
      </ul>
    </div>
          


</body>
</html>