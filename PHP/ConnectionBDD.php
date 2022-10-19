<?php

class ConnectionBDD
{
    private static $_instance = null;
    public function __construct()
    {

    }

    function connexion()
    {
        $pdo = new PDO(
            'pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
        return $pdo;

    }
    public static function getInstance() {

        if(is_null(self::$_instance)) {
            self::$_instance = new ConnectionBDD();
        }

        return self::$_instance;
    }


}
?>