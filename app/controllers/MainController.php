<?php

use app\core\Controller;

class MainController extends Controller
{
    public function actionIndex(){

        $this->view->render('Индекс маин');
        return true;
    }
}