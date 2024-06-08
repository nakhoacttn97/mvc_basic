<?php
class App{
    protected $__controllerName = "Home";
    protected $__action;
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
        if(isset($__urlArr[0])){
            $this->__controllerName = ucfirst($__urlArr[0])."Controller";
        }else{
            $this->__controllerName = ucfirst($this->__controllerName)."Controller";
        }

        if(file_exists('app/controllers/'.$this->__controllerName.'.php')){
            include_once 'app/controllers/'.$this->__controllerName.'.php';
            $this->__controller = new $this->__controllerName();
        }else{
            // require default
            echo "Not found Controller Name";
        }

        if(isset($__urlArr[2])){
            $this->__action = $__urlArr[1];
            // check method exists
            if(method_exists($this->__controller, $this->__action)){
                $this->__controller->{$this->__action}();
            }else{
                echo "Load method failed !";
            }
        }else{
            if(method_exists($this->__controller, $this->__action)){
                $this->__controller->{$this->__action}();
            }else{
                echo "Not found";
            }
        }
    }
}