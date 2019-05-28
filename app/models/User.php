<?php

namespace app\models;

use app\libs\Db;
use app\libs\Dev;

class User
{
    /**
     * @return array
     */
    public function getStudents()
    {

        $db = Db::getInstance();
        $users = $db->select('students', ['id', 'email' ,'first_name', 'last_name', 'group_num', 'points']);
        return $users;

    }

    /**
     * @param $post
     * @return bool
     */
    public function saveStudent($post)
    {
        $db = Db::getInstance();
        unset($post['save']);
        $password = md5($post['password']);
        $post['password'] = $password;
        $result = $db->insert('students', $post);

        if ($result) {
            return true;
        }

    }

    /**
     * @param $post
     * @param string $param
     * @return bool
     */
    public function checkStudent($post,$param = '')
    {
        $db = Db::getInstance();
        unset($post['submit']);
        if (isset($post['remember'])) {
            unset($post['remember']);
        }
        $password = md5($post['password']);
        $post['password'] = $password;
        $users = $db->check('students', ['email', 'password','id','first_name'], $post);
        if (!empty($param)){
            return $users[$param];
        }
        if ($users) {
            return true;
        }else{
            return false;
        }

    }

    /**
     * @param $post
     * @return bool
     */
    public function checkCookie($post)
    {
        $db = Db::getInstance();
        $password = $post;
        $arr = [
            'password' => $password,
        ];
        $users = $db->check('students', ['password'], $arr);

        if ($users) {
            return true;
        }

    }

    /**
     * @param $post
     */
    public function remember($post)
    {
        $password = md5($post['password']);
        setcookie('pass', $password, time() + 3600, '/');

    }
}