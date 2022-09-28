<?php

class ConnectionBDD
{
    public function __construct()
    {

    }

    function connexion()
    {
        $pdo = new PDO(
            'pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
        return $pdo;

    }


}