<?php

include_once('fonct.php');

$nom = $_GET['nom'];
$bdd = connexion();
    $id = getidLaureat($nom); 
    $query ="DELETE FROM p09_recompenserlaureat WHERE idLaureat = ".$id .";";
    $query1 = "DELETE FROM p09_laureat WHERE idLaureat =".$id.";";
    mysqli_query($bdd, $query); 
    mysqli_query($bdd, $query1); 
    mysqli_close($bdd); 
    header('Location: listelaureats.php');
exit;
?>