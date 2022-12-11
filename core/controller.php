<?php
class controller{

    function model($modelurl) {
        require ("model/model_".$modelurl.".php");
        $classname = "model_".$modelurl;
        $this->model = new $classname;
    }

    function view($urlview,$data=[]){
        require ("header.php");
        require ("views/".$urlview.".php");
        require ("footer.php");
    }
}