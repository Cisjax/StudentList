<?php

namespace app\models;

use app\libs\Db;
use app\libs\Dev;

class User
{
    public function getStudents()
    {

        $db = Db::getInstance();
        $users = $db->select('students', ['id', 'first_name', 'last_name', 'group_num', 'points']);
        return $users;

    }
    public function saveStudent($post){
        $db = Db::getInstance();
        unset($post['save']);
        $password = md5($post['password']);
        $post['password'] = $password;
        $result = $db->insert('students', $post);

    }
    public function checkStudent($post){
        $db = Db::getInstance();
        unset($post['submit']);
        $password = md5($post['password']);
        $post['password'] = $password;
        $users = $db->check('students', ['email', 'password'],$post);

        if ($users){
            return true;
        }

    }
}