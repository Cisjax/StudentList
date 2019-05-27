<?php

use \app\core\Controller;

class UserController extends Controller
{
    public function actionLogin(){

        $this->view->render('Вход');
        return true;
    }
    public function actionRegister(){
        $this->view->render('Регистрация');
        return true;
    }
}