<?php

class Connexion
{
    /* permet de vérifier les données lors de la connection d'un étudiant*/
    function connexionEtu ($bdd, $mail, $mdp ){


        $sql="Select * From etudiant WHERE email = '$mail' ";

        $reponse = $bdd->prepare($sql);
        $reponse->execute();

        $row = $reponse->fetch(PDO::FETCH_ASSOC);
        if(password_verify($mdp, $row['mdp']) and $row['email']==$mail){

            return true;}
        else
            return false;

    }
    /* permet de vérifier les données lors de la connection d'un professeur*/
    function connexionProf ($bdd, $mail, $mdp ){


        $sql="Select * From prof WHERE email = '$mail' ";

        $reponse = $bdd->prepare($sql);
        $reponse->execute();

        $row = $reponse->fetch(PDO::FETCH_ASSOC);
        if(password_verify($mdp, $row['mdp']) and $row['email']==$mail){

            return true;}
        else
            return false;

    }
    /* permet de savoir si la personne est un prof*/
    function TrouveProf ($bdd, $mail ){


        $sql="Select * From prof WHERE email = '$mail' ";

        $reponse = $bdd->prepare($sql);
        $reponse->execute();


        if($reponse->rowCount()>0){

            return true;}
        else
            return false;

    }
    /*permet de savoir si la personne est un etudiant*/
    function TrouveETu ($bdd, $mail ){


        $sql="Select * From etudiant WHERE email = '$mail' ";

        $reponse = $bdd->prepare($sql);
        $reponse->execute();


        if($reponse->rowCount()>0){

            return true;}
        else
            return false;

    }


}

?>