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

    public function select($table, $params = [])
    {
        $sql = "SELECT ";
        $i = 0;
        foreach ($params as $param) {
            $sql .= $param;
            $i++;
            if ($i != count($params)) {
                $sql .= ',';
            }
        }
        $sql .= ' FROM ' . $table;
        $result = $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        }
    }

    public function check($table, $params = [], $post)
    {
        $sql = 'SELECT ';
        $i = 0;
        foreach ($params as $param) {
            $sql .= $param;
            $i++;
            if ($i != count($params)) {
                $sql .= ', ';
            }
        }
        $sql .= ' FROM ' . $table . ' WHERE ';

        $i = 0;
        foreach ($post as $paramId => $param) {
            $sql .= $paramId;
            $sql .= '= ?';
            $i++;
            if ($i != count($params)) {
                $sql .= ' AND ';
            }
        }

        $stmt = $this->db->prepare($sql);

        $i = 1;
        foreach ($post as $paramId => $params) {
            $stmt->bindValue($i, $params);
            $i++;
        }
        $stmt->execute();
        $result = $stmt->fetchColumn();

        if ($result) {
            return true;
        }
    }

    public function insert($table, $post = [])
    {
        $sql = "INSERT INTO " . $table . ' (';
        $bindParams = [];
        $i = 0;
        foreach ($post as $paramId => $param) {
            $sql .= $paramId;
            $i++;
            if ($i != count($post)) {
                $sql .= ', ';
            }
        }

        $sql .= ') VALUES (';

        $i = 0;
        foreach ($post as $paramId => $param) {
            $sql .= '?';
            $i++;
            if ($i != count($post)) {
                $sql .= ', ';
            }
        }

        $sql .= ')';
        $stmt = $this->db->prepare($sql);
        $i = 1;
        foreach ($post as $paramId => $params) {
            $stmt->bindValue($i, $params);
            $i++;

        }

    }
}
