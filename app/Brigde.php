<?php
spl_autoload_register(function($class){
    include_once "app/core/".$class.".php";
});
?>