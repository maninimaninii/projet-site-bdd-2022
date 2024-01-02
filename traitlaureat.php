<?php
include_once("fonct.php"); 

$tab = ['nom', 'sexe', 'pays', 'metier', 'prix']; 
if(valide($_GET, $tab)){
$nom = $_GET['nom']; 
$sexe = $_GET['sexe']; 
$pays = $_GET['pays']; 
$metier = $_GET['metier'];
$prix =$_GET['prix']; 


  $bdd = connexion(); 
    $query = "INSERT INTO p09_laureat (nomLaureat, sexe, pays, metier) VALUES ('".$nom."', '".$sexe ."', '".$pays ."', '".$metier ."'); "; 
  if(!mysqli_query($bdd, $query)){
    echo"Impossible d'inserer le laureat demandé veuillez réessayer".mysqli_error($phpconnect); 
    include("inserelaureat.html"); 
  }

  if($prix != "aucun"){
    $date = $_GET['date']; 
  $query = "INSERT INTO p09_recompenserlaureat VALUES ((SELECT idlaureat FROM p09_laureat WHERE nomlaureat = '".$nom ."'), (SELECT idprix FROM p09_prix WHERE nomprix LIKE '%".$prix ."'), '".$date."'); "; 
  mysqli_query($bdd, $query);
    mysqli_close($bdd); 
    include('listelaureats.php'); 
  }else{
  mysqli_close($bdd); 
  include('listelaureats.php'); 
}}
  
  ?>