<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Robin DE MARCH, Ali SYED & Philippe PERECHODOV">
  <title>GRAP.fr - Games by R, A & P</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Fontawsome -->
  <script src="https://kit.fontawesome.com/fbdd9c8340.js" crossorigin="anonymous"></script>

  <!-- Style CSS -->
  <link rel="stylesheet" href="style.css">

</head>


<body>

<!-- Connection à la base de donnée -->
<?php
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=catalogueacs;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
    catch(PDOException $e)
  {
    die('Ereur : '.$e->getMessage());
  }
    function debug($var, $style = "")

?>

<!-- Fonction de connexion avec login -->
<?php
// On prolonge la session
session_start();

// On teste si la variable de session existe et contient une valeur
if(!isset($_SESSION['login']))
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  $client = " à vous, visiteur(euse)";
  $connexion = "<i class=\"fas fa-headset\"></i> Se connecter à mon compte";
  $goLog = "login";
  $admin = "";
}
else {
  $client = ", " . $_SESSION['prenom'] . " " . $_SESSION['nom'];
  $connexion = "<i class=\"fas fa-ghost\"></i> Me déconnecter";
  $goLog = "logout";

  if ($_SESSION['admin']) {
    $admin = "<i class=\"fas fa-chess-king\"></i> Page d'administration";
  }
  else {
    $admin = "";
  }
}
?>

<!-- fonction pour le changement de background du "body" (Début) -->
<?php
$numero = rand(1, 11);
?>

<style type="text/css">
  body {
   background-image: url("img/BG/<?php echo $numero ?>.webp");
   background-size: cover;
   background-position: center;
  }
</style>
<!-- fonction pour le changement de background du "body" (Fin) -->


<!-- Le HTML -->

<nav id="navBarre" class="container-fluid fixed-top">
  <div class="row justify-content-around pt-3 pb-3 align-items-center">
    <a class="font-weight-bold" href="index.php">GRAP.fr</a>
    <p class="mb-0">Bonjour<?php echo $client ?> !</p>
    <a href="admin.php"><?php echo $admin ?></a>
    <a href="<?php echo $goLog ?>.php"><?php echo $connexion ?></a>

    <form method="post" action="recherche.php">
          <!-- <label id="clr">Recherche</label> -->
          <input class="pl-3 search-txt" type="search" name="jeux" placeholder="Indiquez le jeux recherché">
          <button type="submit" class="btn-search"><i id="loupe" class="fas fa-search"></i></button>
    </form>

    <a href="panier.php"><i class="fas fa-gamepad"></i> Mon Panier</a>
  </div>
</nav>
