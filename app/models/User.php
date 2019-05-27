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
    public function getActive(){
        Dev::debug($_SERVER);

    }
}