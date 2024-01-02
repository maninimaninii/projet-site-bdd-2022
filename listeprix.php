<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Prix</title>
    <link rel='stylesheet' href='styl.css'>
  </head>
  <body>
  <header>
        <div class="wrap">
            <ul class="navigation">
                <li><a href="acceuil.html"> Acceuil </a></li>
                <li><a href="listepalmes.php"> Palmes d'or </a></li>
                <li><a href="listefilms.php"> Films récompensés </a></li>
                <li><a href="listelaureats.php"> Lauréats </a></li>
            </ul>
        </div>
      </div>
    </header>

  <section>
   <?php 
   include("fonct.php");
   $col = getAllPrix(); 
echo "<br> <br> <br> <br> <ul>"; 
foreach($col as $c){
    echo"<li> <ul>";
    foreach($c as $x => $v){
        echo"<li>"; 
    echo  $x ." : ". $v ."</li><br>";}
    echo "</ul> </li>";
    echo "<br> <br> <br> <br>";
}
echo "</ul>"; ?>

  </section>

  </body>
</html>