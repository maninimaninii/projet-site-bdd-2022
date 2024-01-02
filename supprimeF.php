<?php

include_once('fonct.php');

$nom = $_GET['nom'];
    $bdd = connexion();
   $id = getidFilm($nom);
    $query ="DELETE FROM p09_recompenserfilm WHERE idFilm = ".$id .";";
    $query1 = "DELETE FROM p09_film WHERE idFilm =".$id.";";
    mysqli_query($bdd, $query); 
    mysqli_query($bdd, $query1); 
    mysqli_close($bdd); 
    header('Location: listefilms.php');
exit;
?>