<?php

 include_once("fonct.php");
 $bdd = connexion();
 $query = "SELECT idlaureat FROM p09_laureat WHERE nomLaureat ='Manny Lounes';";
 $resul = mysqli_query($bdd, $query); 
 if(!mysqli_num_rows($resul) == 0){
    $sql = "UPDATE p09_film SET titreFilm = 'Titanic', paysFilm='Maroc', idRealisateur = '"  .mysqli_fetch_assoc($resul)['idlaureat']."' WHERE idfilm = 9;";
      if(mysqli_query($bdd, $sql)){
        echo "fait";
      }  
 }
 
  ?>



