<?php

use \app\core\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        if (isset($_SESSION['id'])) {
            $data = $this->model->getStudents();
            $active = $this->route['action'];
            $this->view->render($active,'Список студентов', $data, 'user');
            return true;
        }
        header('Location: user/login');
    }


    public
    function actionLogin()
    {   $active = $this->route['action'];
        $this->view->render($active,'Вход');
        return true;
    }

    public
    function actionRegister()
    {
        $active = $this->route['action'];
        $this->view->render($active,'Регистрация');
        return true;
    }
}