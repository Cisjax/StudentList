<?php

namespace app\libs;

class Db
{

    private static $_instance = null;
    private $db;

    private function __construct()
    {
        try {
            $paramsPath = ROOT . '/app/config/db.php';
            $params = include_once($paramsPath);

            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            $this->db = new \PDO($dsn, $params['user'], $params['password']);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function select($table,$params = []){
        $sql = "SELECT ";
        $i = 0;
        foreach ($params as $param){
            $sql .= $param;
            $i++;
            if ($i != count($params)) {
                $sql .= ',';
            }
        }
        $sql .= ' FROM ' . $table;
        $result = $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        if ($result){
            return $result;
        }
    }


}
