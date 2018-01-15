<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 15/01/2018
 * Time: 12:32
 */

namespace app\model\dao;

use PDO;
use PDOException;

class Provider extends PDO {

    const NOME_SERVIDOR = "localhost";
    const USUARIO_SERVIDOR = "root";
    const SENHA_SERVIDOR = "";
    const BANCO_DE_DADOS = "nomedobanco";

    private static $instance = NULL;

    private static function Provider() {
        try {
            self::$instance = new Provider('mysql:host=' . self::NOME_SERVIDOR . ';dbname=' . self::BANCO_DE_DADOS . ';charset=utf8', self::USUARIO_SERVIDOR, self::SENHA_SERVIDOR);
            self::$instance->setAttribute(self::ATTR_ERRMODE, self::ERRMODE_EXCEPTION);
            return self::$instance;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public static function getProvider() {
        if (self::$instance == NULL) :
            self::$instance = self::Provider();
        else :
            self::$instance;
        endif;
        return self::$instance;
    }

    public static function clearProvider() {
        $pdo = NULL;
        try {
            return $pdo;
        } catch (PDOException $error) {
            echo $error->getMessage();
        } finally {
            return $pdo;
        }
    }
}