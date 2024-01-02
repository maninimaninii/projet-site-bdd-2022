<?php

include_once('fonct.php');

$nom = $_GET['nom'];
$bdd = connexion();
    $id = getidFilm($nom); 

echo " <!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>Films</title>
    <link rel='stylesheet' href='styl2.css'>
  </head>
  <body>
     <main>
<div class='formdiv'>
<form action='modiffilm.php' method='get'>
    <br>

<label for='titre' class='tit'> Titre du film </label>
<input type='text' name='titre' id='titre' required><br><br>

<input type='hidden' name='id' id='id' value=".$id.">
<label for='pays' class='tit'> Pays d'origine du film </label>
<input type='text' name='pays' id='pays' required><br><br>

<label for='realisateur' class='tit'> Nom du Réalisateur </label>
<input type='text' name='realisateur' id='realisateur'><br><br>


<input type='submit' name='enregistrement' value='Modifier'>
<input type='reset' name ='annuler' value='Effacer'>
</div>
</main>


</form>  
</body>
</html>";

