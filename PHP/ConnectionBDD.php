<?php

/**
 *
 */
class ConnectionBDD
{
    /* permet grâce a un singleton de créer une seule connection a la base de donnée sur toutes les pages*/
    /**
     * @var null
     */
    private static $_instance = null;
    /**
     * @var PDO
     */
    private static $pdo;

    /**
     *
     */
    private function __construct()
    {
        self::$pdo = new PDO(
            'pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return PDO
     */
    public static function getpdo(){

        return self::$pdo;
    }

    /**
     * @return ConnectionBDD|null
     */
    public static function getInstance() {

        if(is_null(self::$_instance)) {
            self::$_instance = new ConnectionBDD();
        }

        return self::$_instance;
    }


}
?>