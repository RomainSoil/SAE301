<?php

/**
 *
 */
class username
{
    /**
     * @param $id
     */
    function username($id){
        $classe = new Connexion();
        $bdd= ConnectionBDD::getInstance()::getpdo();
        if ($classe->TrouveETu($bdd, $id)) {
            $req = "SELECT nom, prenom from etudiant where email=?";
            $res = $bdd->prepare($req);
            $res->execute(array($id));
        }
        elseif($classe->TrouveProf($bdd, $id)){
            $res = $bdd->prepare("SELECT nom, prenom from prof where email=?");
            $res->execute(array($id));
        }
        return $res->fetch();
    }

}