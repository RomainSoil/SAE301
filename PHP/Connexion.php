<?php

class Connexion
{

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

    function TrouveProf ($bdd, $mail ){


        $sql="Select * From prof WHERE email = '$mail' ";

        $reponse = $bdd->prepare($sql);
        $reponse->execute();


        if($reponse->rowCount()>0){

            return true;}
        else
            return false;

    }

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