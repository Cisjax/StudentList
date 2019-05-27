<?php

use \app\core\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        if (isset($_SESSION['id'])) {
            $data = $this->model->getStudents();
            $active = $this->route['action'];
            $this->view->render($active, 'Список студентов', $data, 'user');
            return true;
        }
        header('Location: user/login');
    }

    public function actionLogout(){
        unset($_SESSION['id']);
        header('Location: / ');
        $active = $this->route['action'];
        $this->view->render($active, 'Вход');
        return true;
    }

    public
    function actionLogin()
    {
        if (isset($_POST['submit'])) {
            $result = $this->model->checkStudent($_POST);
            if ($result === true){
                $_SESSION['id'] = $_POST['email'];
                header('Location: / ');
            }
        }
        $active = $this->route['action'];
        $this->view->render($active, 'Вход');
        return true;
    }

    public
    function actionRegister()
    {
        if (isset($_POST['save'])) {
            $this->model->saveStudent($_POST);
            header('Location: /user/login');
        }
        $active = $this->route['action'];
        $this->view->render($active, 'Регистрация');
        return true;
    }


}