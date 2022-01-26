<?php

namespace App\DataProvider;

use PDO;

class Database
{
    //connexion a PDO
    private static $username = 'root';
    private static $pwd = '';
    private static $dsn = 'mysql://host=localhost;port=3306;dbname=cinema';

    /** @var PDO */
    private static $connexion = null;

    public static function getConnection()
    {
        if (!self::$connexion) {
            self::$connexion = new PDO(self::$dsn, self::$username, self::$pwd, []);
        }

        return self::$connexion;
    }
}
