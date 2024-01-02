<?php
include_once("fonct.php"); 


//script php pour gerer la modification
/*$tab = ['nom', 'sexe', 'pays', 'metier', 'prix']; 
if(valide($_GET, $tab)){*/
$nom = $_GET['nom']; 
$sexe = $_GET['sexe']; 
$pays = $_GET['pays']; 
$metier = $_GET['metier'];
/*$prix =$_GET['prix']; 
$date = $_GET['date']; */
$id = $_GET['id'];

    echo "voila";
  $bdd = connexion(); 
    $query = "UPDATE p09_laureat SET nomLaureat = '".$nom. "', sexe = '".$sexe."', pays = '".$pays."', metier = '".$metier."' WHERE idlaureat = ".$id.";";
    mysqli_query($bdd, $query);
    mysqli_close($bdd); 
    header('Location: listelaureats.php');
exit;
//}
?>