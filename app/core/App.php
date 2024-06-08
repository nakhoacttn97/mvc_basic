<?php
class App{
    protected $__controllerName = "Home";
    protected $__action = "index";
    protected $__params;
    protected $__controller;

    public function __construct(){
        $this->handleUrl();
    }

    protected function getUrl(){
        if(isset($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        }else{
            $url = '/';
        }

        return $url;
    }

    protected function handleUrl(){
        $__url = $this->getUrl();

        $__urlArr = array_filter(explode('/', $__url));
        $__urlArr = array_values($__urlArr);

        // handle controller Name
        if(!empty($__urlArr[0])){
            $this->__controllerName = ucfirst($__urlArr[0])."Controller";
        }else{
            $this->__controllerName = ucfirst($this->__controllerName)."Controller";
        }

        // Check if controller file exists and include it
        if(file_exists('app/controllers/'.$this->__controllerName.'.php')){
            include_once 'app/controllers/'.$this->__controllerName.'.php';
            // check class ControllerName exists
            if(class_exists($this->__controllerName)){
                $this->__controller = new $this->__controllerName();
            }else{
                echo "Controller Name not found !";
            }
        }else{
            echo "file not found !";
        }

        // handle action
        if(!empty($__urlArr[1])){
            $this->__action = $__urlArr[1];
        }

        // handle for params
        unset($__urlArr[0]);
        unset($__urlArr[1]);
        if(isset($__urlArr)){
            $this->__params = array_values($__urlArr);
        }else{
            $this->__params = [];
        }
        

        // check method exists ?
        if(method_exists($this->__controller, $this->__action)){
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        }

        //var_dump($this->__params);
    }
}
?>