<?php

class username
{
    function username($id){
        $classe = new Connexion();
        $bdd= new PDO('pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
        if ($classe->TrouveETu($bdd, $id)) {
            $req = "SELECT nom, prenom from etudiant where email=?";
            $res = $bdd->prepare($req);
            $res->execute(array($id));
        }
        elseif($classe->TrouveProf($bdd, $id)){
            $res = $bdd->prepare("SELECT nom, prenom from etudiant where email=?");
            $res->execute(array($id));
        }
        return $res->fetch();
    }

}