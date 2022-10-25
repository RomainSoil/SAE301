<?php

class ConnectionBDD
{
    /* permet grâce a un singleton de créer une seule connection a la base de donnée sur toutes les pages*/
    private static $_instance = null;
    private static $pdo;
    private function __construct()
    {
        self::$pdo = new PDO(
            'pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getpdo(){

        return self::$pdo;
    }

    public static function getInstance() {

        if(is_null(self::$_instance)) {
            self::$_instance = new ConnectionBDD();
        }

        return self::$_instance;
    }


}
?>