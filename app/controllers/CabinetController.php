<?php


class CabinetController extends \app\core\Controller
{
    public function actionIndex()
    {
        $data['name'] =  $_SESSION['name'];
        $active['action'] = $this->route['action'];
        $active['controller'] = $this->route['controller'];
        $this->view->render($active, 'Кабинет', $data, 'user');
        return true;
    }

    public function actionEdit()
    {
        if (isset($_POST['save'])) {
            $result = $this->model->updateStudent($_POST);
            if ($result) {
                header('Location: /');
            }
        }
        if (isset($_SESSION['id'])) {
            $post = [
                'id' => $_SESSION['id']
            ];
            $data = $this->model->getStudent($post);
            $active['action'] = $this->route['action'];
            $active['controller'] = $this->route['controller'];
            $this->view->render($active, 'Редактирование', $data, 'user');
            return true;
        } else {
            echo 'Ошибка выборки';
        }

    }

    public function actionDelete(){
        if (isset($_POST['submit'])){
            $result = $this->model->deleteStudent($_SESSION['id'],$_POST['password']);
            if ($result){
                header('Location: /user/login');
            }else{
                $data['errors'] = 'Неверный пароль';
            }
        }
        $active['action'] = $this->route['action'];
        $active['controller'] = $this->route['controller'];
        $this->view->render($active, 'Редактирование', $data=[], 'user');
        return true;
    }
}