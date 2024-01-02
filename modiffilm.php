<?php

include_once('fonct.php'); 
  $bdd = connexion(); 
  $rea = $_GET['realisateur'];
  $titre = $_GET['titre'] ; 
  $pays = $_GET['pays'];
  $id = $_GET['id'];


  $query = "SELECT idlaureat FROM p09_laureat WHERE nomLaureat ='". $rea . "';";

  $resul = mysqli_query($bdd, $query); 
  if(mysqli_num_rows($resul) == 0){
    
      $sql = "UPDATE p09_film SET titreFilm = '".$titre."', paysFilm='".$pays."' WHERE idfilm =".$id.";";
      mysqli_query($bdd, $sql);
    }else{
      $sql = "UPDATE p09_film SET titreFilm = '".$titre."', paysFilm='".$pays."', idRealisateur = '"  .mysqli_fetch_assoc($resul)['idlaureat']."' WHERE idfilm = ".$id.";";
      mysqli_query($bdd, $sql);  
    }

  
  mysqli_close($bdd); 
  header('Location: listefilms.php');
exit;
?>