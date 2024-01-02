<?php


function valide($method, $tab){
    foreach($tab as $t){
        if(!isset($method[$t])){
            return false;
        }
    }
    return true;
}

function connexion() {

    $bdd = mysqli_connect("localhost", "root", "", "palme");
    return $bdd; 
}

function getAllLaureats(){
    $bdd = connexion();
    $query = "SELECT nomLaureat, sexe, pays, metier, EditionPrixL, nomPrix FROM (p09_laureat NATURAL JOIN p09_recompenserlaureat NATURAL JOIN p09_prix);";
    $resultat = mysqli_query($bdd, $query);
    $resu = array();
    while($donnees = mysqli_fetch_assoc($resultat)){
            $resu[] = array(
                "Nom Laureat" => $donnees["nomLaureat"], 
                "Sexe" => $donnees["sexe"],
                "Pays" => $donnees["pays"],
                "Métier" => $donnees["metier"],
                "Edition du prix" => $donnees["EditionPrixL"],
                "Nom du Prix" => $donnees["nomPrix"]
            );
    }
    mysqli_free_result($resultat); 
    mysqli_close($bdd); 
    return $resu; 

}




function getAllPrix(){
    $bdd = connexion(); 
    $query = "SELECT * FROM p09_prix";
    $resultat = mysqli_query($bdd, $query); 
    $resu = array(); 
    while($donnees = mysqli_fetch_assoc($resultat)){
        $resu[] = array(
            "Nom du prix" => $donnees["nomPriX"], 
            "Type de prix" => $donnees["typePrix"]
        );
    }
    mysqli_free_result($resultat); 
    mysqli_close($bdd); 
    return $resu; 
}


function getAllFilms(){
    $bdd = connexion();

    $query = "SELECT titreFilm, paysFilm,idRealisateur, EditionPrixF, nomPrix FROM (p09_film NATURAL JOIN p09_recompenserfilm NATURAL JOIN p09_prix);";
    $resultat = mysqli_query($bdd, $query);
    $resu = array();
    while($donnees = mysqli_fetch_assoc($resultat)){
        if($donnees['idRealisateur'] == null){ //si le realisateur n'est pas connu akors on ne l'affiche pas
        $resu[] = array(
            "Titre du film" => $donnees["titreFilm"], 
            "Pays" => $donnees["paysFilm"],
            "Edition du prix" => $donnees["EditionPrixF"],
            "Nom du Prix" => $donnees["nomPrix"]
        );}else{
            $query1 = "SELECT nomLaureat FROM p09_laureat WHERE idlaureat = ".$donnees['idRealisateur'].";";
            $resul = mysqli_query($bdd,$query1);
                $resu[] = array(
                    "Titre du film" => $donnees["titreFilm"], 
                    "Pays" => $donnees["paysFilm"],
                    "Edition du prix" => $donnees["EditionPrixF"],
                    "Nom du Realisateur" => mysqli_fetch_assoc($resul)['nomLaureat'],
                    "Nom du Prix" => $donnees["nomPrix"]
                );
            }
    }
    mysqli_free_result($resultat); 
    mysqli_close($bdd); 
    return $resu; 

}

function getAllPalmes(){
    $bdd = connexion();
    $query = "SELECT titreFilm, paysFilm, nomLaureat AS realisateur, EditionPrixF, nomPrix FROM (p09_film NATURAL JOIN p09_recompenserfilm NATURAL JOIN p09_prix INNER JOIN p09_laureat ON idRealisateur = p09_laureat.idlaureat) WHERE nomPrix LIKE 'Palme%';";
    $resultat = mysqli_query($bdd, $query);
    $resu = array();
    while($donnees = mysqli_fetch_assoc($resultat)){
            $resu[] = array(
                "Titre du film" => $donnees["titreFilm"], 
                "Pays" => $donnees["paysFilm"],
                "Realisateur" => $donnees["realisateur"],
                "Edition du prix" => $donnees["EditionPrixF"],
                "Nom du Prix" => $donnees["nomPrix"]
            );
    }
    mysqli_free_result($resultat); 
    mysqli_close($bdd); 
    return $resu; 

}

function supprimerL($nom){
    $bdd = connexion();
    $id = getidlaureat($nom); 
    $query ="DELETE FROM p09_recompenserlaureat WHERE idlaureat = '".$id ."';";
    $query1 = "DELETE FROM p09_laureat WHERE idlaureat ='".$id."';";
    mysqli_query($bdd, $query); 
    mysqli_query($bdd, $query1); 
    mysqli_close($bdd); 
    include("listelaureats.php");

}

function supprimerF($nom){
    $bdd = connexion();
    $id = getidfilm($nom);
    $query ="DELETE FROM p09_recompenserfilm WHERE idfilm = '".$id ."';";
    $query1 = "DELETE FROM p09_film WHERE idfilm ='".$id."';";
    mysqli_query($bdd, $query); 
    mysqli_query($bdd, $query1); 
    mysqli_close($bdd); 

}

function getidlaureat($nom){
    $bdd = connexion();
    $query = "SELECT idlaureat FROM p09_laureat WHERE nomLaureat = '".$nom."';"; 
    $resultat = mysqli_query($bdd, $query);
    $id = mysqli_fetch_assoc($resultat)["idlaureat"]; 
    mysqli_free_result($resultat); 
    mysqli_close($bdd); 
    return $id;
}

function getidfilm($nom){
    $bdd = connexion();
    $query = "SELECT idfilm FROM p09_film WHERE titreFilm LIKE '".$nom."%';"; 
    $resultat = mysqli_query($bdd, $query);
    $id = mysqli_fetch_assoc($resultat)["idfilm"]; 
    mysqli_free_result($resultat); 
    mysqli_close($bdd); 
    return $id;
}


