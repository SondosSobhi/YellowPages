<?php


class BaseController
{
    protected $controller;
    protected $action;

    protected $data = array();

    public function notFoundAction(){
        require_once('/../View/notfound/notfound.php');
    }

    public function setController($controller){
        $this->controller = $controller;
    }

    public function setAction($action){
        $this->action = $action;
    }

    public function indexView($name){
        extract($this->data);
        require_once('/../View/index/' . $name . '.php');
    }

    public function homeView($name){
        extract($this->data);
        require_once('/../View/home/' . $name . '.php');
    }
}
?>
