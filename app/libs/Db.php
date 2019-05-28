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
            if ($i != count($post)) {
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
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        }
    }

    public function insert($table, $post = [])
    {
        $sql = "INSERT INTO " . $table . ' (';
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

        $result = $stmt->execute();
        if ($result){
            return true;
        }

    }
    public function update($table, $post = [], $id = '')
    {
        $sql = "UPDATE " . $table . ' SET ';
        $i = 0;
        foreach ($post as $paramId => $param) {
            $sql .= $paramId . '=?';
            $i++;
            if ($i != count($post)) {
                $sql .= ', ';
            }
        }

        $sql .= ' WHERE id = ?';
        $post['id'] = $id;
        $stmt = $this->db->prepare($sql);
        $i = 1;
        foreach ($post as $paramId => $params) {
            $stmt->bindValue($i, $params);
            $i++;

        }

        $stmt->execute();
        $result = $stmt->rowCount();

        if ($result){
            return true;
        }

    }

    public function delete($table, $id){
        $sql = 'DELETE FROM ' .  $table . ' WHERE id= ?';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1,$id);
        $result = $stmt->execute();

        if ($result){
            return true;
        }
    }
}
