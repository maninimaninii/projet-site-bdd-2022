<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Films</title>
    <link rel='stylesheet' href='styl.css'>
  </head>
  <body>
  <header>
        <div class="wrap">
            <ul class="navigation">
                <li><a href="acceuil.html"> Acceuil </a></li>
                <li><a href="listepalmes.php"> Palmes d'or </a></li>
                <li><a href="listeprix.php"> Prix</a></li>
                <li><a href="listelaureats.php"> Lauréats </a></li>
            </ul>
        </div>
      </div>
    </header>

  <section class="coucou">
   <?php 
   include_once("fonct.php");
   $col = getAllFilms(); 
echo "<br> <br> <br> <br><ul>"; 
foreach($col as $c){
    echo"<li> <ul>";
    foreach($c as $x => $v){
        echo"<li>"; 
    echo  $x ." : ". $v ."</li><br>";}
    echo ' <button class="supprime" onclick="supprimer('."'".$c['Titre du film']."'".')">Supprimer</button> <br>';
    echo ' <button class="modifie" onclick="modifier('."'".$c['Titre du film']."'".')">Modifier</button> <br>';
    echo "</ul> </li>";
    echo "<br> <br> <br> <br>";
}
echo "</ul>"; ?>

  </section>

  <footer>
    <a href="insererfilm.html"> Insérer un nouveau film </a>
  </footer>

  </body>
</html>

<script>
function supprimer(nom) {
  //fonction appellee lors du clic, confirmation de la suppression puis fonctions php pour s'en occuper
  if (confirm('Voulez-vous vraiment supprimer l élément ' + nom +' ?')) {
    window.location.href = 'supprimeF.php?nom=' + nom;
  }
}

function modifier(nom) {
  //fonction appellee lors du clic, confirmation de la suppression puis fonctions php pour s'en occuper
  if (confirm('Voulez-vous vraiment modifier l élément ' + nom +' ?')) {
    window.location.href = 'modifieF.php?nom=' + nom;
  }
}
</script>