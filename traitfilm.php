<?php

include_once('fonct.php'); 
  $tab = ['titre', 'pays', 'prix' ];
  $bdd = connexion(); 
  $rea = $_GET['realisateur'];
  $titre = $_GET['titre'] ; 
  $pays = $_GET['pays'];
  $prix = $_GET['prix'];
  $date = $_GET['date']; 


  $query = "SELECT idlaureat FROM p09_laureat WHERE nomlaureat ='". $rea . "';";

  $resul = mysqli_query($bdd, $query); 
  if(mysqli_num_rows($resul) == 0){
      $sql = "INSERT INTO p09_film(titreFilm, paysFilm) VALUES ('" . $titre ."', '" . $pays ."');"; } 
  else{
      $sql = "INSERT INTO p09_film(titreFilm, paysFilm, idRealisateur) VALUES ('" . $titre ."', '" . $pays ."', ".mysqli_fetch_assoc($resul)['idlaureat'].");"; 
  }
  if(!mysqli_query($bdd, $sql)){
    echo"Impossible d'inserer le film demandé veuillez réessayer, en insérant au préalable le realisateur";
    echo"<br> <br>";
    echo"<a href='inserelaureat.html'> Insérer un nouveau réalisateur </a>" ;
    include("insererfilm.html"); 
  }
  $query = "INSERT INTO p09_recompenserfilm VALUES ((SELECT idfilm FROM p09_film WHERE titreFilm = '".$titre ."'), (SELECT idprix FROM p09_prix WHERE nomPriX LIKE '%".$prix ."'), '".$date."'); "; 
  if(mysqli_query($bdd, $query)){
    mysqli_free_result($resul); 
    mysqli_close($bdd);
    include('listefilms.php'); 
     
  }
  ?>