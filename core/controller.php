<?php
class controller{
    function view($urlview){
        require ("header.php");
        require ("views/".$urlview.".php");
        require ("footer.php");
    }
}