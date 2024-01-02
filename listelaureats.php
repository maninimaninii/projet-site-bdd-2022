
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lauréats</title>
    <link rel='stylesheet' href='styl.css'>
  </head>
  <body>
  <header>
        <div class="wrap">
            <ul class="navigation">
                <li><a href="acceuil.html"> Acceuil </a></li>
                <li><a href="listepalmes.php"> Palmes d'or </a></li>
                <li><a href="listeprix.php"> Prix</a></li>
                <li><a href="listefilms.php"> Films récompensés </a></li>
            </ul>
        </div>
      </div>
    </header>

  <section>
   <?php 
   include_once("fonct.php");
   $col = getAllLaureats(); 
echo "<br> <br> <br> <br> <ul>"; 
foreach($col as $c){
    echo"<li> <ul>";
    foreach($c as $x => $v){
        echo"<li>"; 
    echo  $x ." : ". $v ."</li><br>";}
    //bouton pour supprimer faisant appel a script js
    echo ' <button class="supprime" onclick="supprimer('."'".$c['Nom Laureat']."'".')">Supprimer</button> <br>';
    //pareil pour modifier
    echo ' <button class="modifie" onclick="modifier('."'".$c['Nom Laureat']."'".')">Modifier</button> <br>';
    echo "</ul></li>";
    echo "<br> <br> <br> <br>";
}
echo "</ul>"; ?>

  </section>

  <footer>
    <a href="inserelaureat.html"> Insérer un nouveau laureat </a>
  </footer>

  </body>
</html>

<script>
function supprimer(nom) {
  //fonction appellee lors du clic, confirmation de la suppression puis fonctions php pour s'en occuper
  if (confirm('Voulez-vous vraiment supprimer l élément ' + nom +' ?')) {
    window.location.href = 'supprimer.php?nom=' + nom;
  }
}

function modifier(nom) {
  //fonction appellee lors du clic, confirmation de la suppression puis fonctions php pour s'en occuper
  if (confirm('Voulez-vous vraiment modifier l élément ' + nom +' ?')) {
    window.location.href = 'modifie.php?nom=' + nom;
  }
}
</script>

