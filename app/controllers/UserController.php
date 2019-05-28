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

    public function actionLogout()
    {
        setcookie("pass", null, -1, '/');
        unset($_SESSION['id']);
        header('Location: /');

        return true;
    }

    public function actionLogin()
    {
        if (isset($_COOKIE['pass']) AND $this->model->checkCookie($_COOKIE['pass'])) {
            header('Location: / ');
        }
        if (isset($_POST['submit'])) {
            $result = $this->model->checkStudent($_POST);
            if ($result === true) {
                $_SESSION['id'] = $this->model->checkStudent($_POST,'id');
                $_SESSION['name'] = $this->model->checkStudent($_POST,'first_name');
                if (isset($_POST['remember'])) {
                    $this->model->remember($_POST);
                }
                header('Location: / ');
            }

        }
        $active = $this->route['action'];
        $this->view->render($active, 'Вход');
        return true;
    }

    public function actionRegister()
    {
        if (isset($_POST['save'])) {
            $result = $this->model->saveStudent($_POST);
            if ($result) {
                header('Location: /user/login');
            }
        }
        $active = $this->route['action'];
        $this->view->render($active, 'Регистрация');
        return true;
    }


}