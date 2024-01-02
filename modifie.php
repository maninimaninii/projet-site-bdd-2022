

<?php
//formulaire pour modifier le laureat choisi

// a noter le passage de la valeur de l'id a travers les fichiers 
include_once('fonct.php');

$nom = $_GET['nom'];
$bdd = connexion();
    $id = getidLaureat($nom); 

echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>Lauréats</title>
    <link rel='stylesheet' href='styl2.css'>
  </head>
  <body>
  <div class='formdiv'>
  <form action='modiflaureat.php' method='get'>
        <br>

    <label for='nom' class='tit'> Nom du Lauréat </label>
    <input type='text' name='nom' id='nom' required><br><br>

    <input type='hidden' name='id' id='id' value=".$id.">

    <label for='pays' class='tit'> Nationalité du Lauréat </label>
    <input type='text' name='pays' id='pays' required><br><br>

    <label for='metier' class='tit'> Métier </label><br>
    <input type='radio' name='metier' id='acteur' value='Acteur' >
    <label for='acteur' class='inline'>Acteur </label>
    <input type='radio' name='metier' id='realisateur' value='Réalisateur' >
    <label for='realisateur' class='inline'>Réalisateur </label>
    <input type='radio' name='metier' id='metteur' value='Metteur en scène' >
    <label for='metteur' class='inline'>Metteur en scène </label>
    <input type='radio' name='metier' id='scenariste' value='Scénariste' >
    <label for='scenariste' class='inline'>Scénariste </label><br><br>

    <label for='sexe' class='tit'> Sexe </label><br>
    <input type='radio' name='sexe' id='masculin' value='masculin'>
    <label for='masculin' class='inline'>Masculin </label>
    <input type='radio' name='sexe' id='feminin' value='feminin'>
    <label for='Féminin' class='inline'>Féminin </label><br><br>



    <input type='submit' name='enregistrement' value='Modifier'>
    <input type='reset' name ='annuler' value='Effacer'>
    </div>
</main>


</form> 
</body>
</html>";



/*<label for='prix' class='tit'>Prix </label><br>
<input type='radio' name='prix' id='prixmasculin' value='masculine' class='prix'>
<label for='masculin' class='inline'>Prix d'interpretation masculine </label>
<input type='radio' name='prix' id='prixfeminin' value='feminine' class='prix'>
<label for='Féminin' class='inline' >Prix d'interpretation féminine </label>
<input type='radio' name='prix' id='miseenscène' value='mise en scène' class='prix'>
<label for='masculin' class='inline'>Prix de la mise en scène </label>
<input type='radio' name='prix' id='scénario' value='scénario' class='prix'>
<label for='Féminin' class='inline'>Prix du scénario </label>
<input type='radio' name='prix' id='aucun' value='aucun' class='prix'>
<label for='aucun' class='inline'>Aucun(réalisateur de film primé) </label><br><br>

<label for='date' class='tit'>Date d'obtention</label>
<input type='date' id='date' name='date'><br><br>*/