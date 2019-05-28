<?php


namespace app\models;

use app\libs\Db;

class Cabinet
{
    /**
     * @param $post
     * @return mixed
     */
    public function getStudent($post)
    {
        $db = Db::getInstance();
        $users = $db->check('students', ['id', 'birth','email' ,'first_name', 'last_name', 'group_num', 'points', 'location','gender'],$post);
        return $users;
    }

    /**
     * @param $post
     * @return bool
     */
    public function updateStudent($post)
    {
        $db = Db::getInstance();
        unset($post['save']);
        $result = $db->update('students', $post, $_SESSION['id']);
        $_SESSION['name'] = $result['first_name'];
        if ($result) {
            return true;
        }
        return false;

    }

    /**
     * @param $id
     * @param $password
     * @return bool
     */
    public function deleteStudent($id,$password){
        $db = Db::getInstance();
        $password = md5($password);
        $result = $db->delete('students', $id);
        if ($result){
            unset($_SESSION['id'],$_SESSION['name']);
            setcookie('pass','',time()-3600,'/');
            return true;
        }
        return false;

    }
}