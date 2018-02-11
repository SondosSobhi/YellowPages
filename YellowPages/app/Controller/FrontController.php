<?php
    class FrontController{
        private $controller = 'index';
        private $action = 'default';

        public function __construct()
        {
            $this->parseUrl();
        }

        private function parseUrl()
        {
            $url = explode('/', trim($_SESSION['url'], '/'));
            if(isset($url[0]) && $url[0] != ''){
                $this->controller = $url[0];
            }
            if(isset($url[1]) && $url[1] != ''){
                $this->action = $url[1];
            }
            return $this;
        }

        public function dispatch(){
            require_once ('/IndexController.php');
            require_once ('/HomeController.php');
            $controllerClassName = ucfirst($this->controller) . 'Controller';
            $actionName = $this->action . 'Action';

            if(!class_exists($controllerClassName)){
                require_once ('/NotFoundController.php');
                $controllerClassName = 'Controller';
            }
            $controller = new $controllerClassName;

            if(!method_exists($controller, $actionName)){
                require_once ('/NotFoundController.php');
                $actionName = 'notFoundAction';
            }
            $controller->$actionName($this->action);

            require_once ('/BaseController.php');
            $urlData = new BaseController();
            $urlData->setController($this->controller);
            $urlData->setAction($this->action);
            }
    }
?>