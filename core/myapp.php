<?php
class myapp{
    public $controller='index';
    public $method = 'index';
    public $param = [];

    public function __construct()
    {
        if(isset($_GET["url"])) {
            $url = $_GET["url"];
            $url = $this->parsurl($url);
            $this->controller = $url[0];
            unset($url[0]);
            if (isset($url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
            $this->param = array_values($url);
        }
            $controllerurl = "controller/".$this->controller.".php";
            if(file_exists($controllerurl)) {
                require ($controllerurl);
                $obj = new $this->controller;
                $obj->model($this->controller);

                if(method_exists($obj,$this->method)) {
                    call_user_func_array([$obj,$this->method], $this->param);
                }
            }
    }

    function parsurl($url){
        $url = explode("/",$url);
        return $url;
    }
}