<?php

class username
{
    function username($id){
        $bdd= new PDO('pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
        $res = $bdd->query("SELECT nom, prenom from etudiant where email='$id'");
        return $res->fetch();
    }

}