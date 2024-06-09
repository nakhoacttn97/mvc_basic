<?php
abstract class BaseController{
    protected string $_layout = 'layout';
    protected $_data;
	protected $_view = '';
	protected $_errors;

    protected function model($_model){
        if(file_exists('app/models/'.$_model.'.php')){
            require_once 'app/models/'.$_model.'.php';
            if(class_exists($_model)){
                $_model = new $_model();
                return $_model;
            }
        }

        return false;
    }

    protected function view(array $data, string $name=NULL){

        extract($data);
        if($name != NULL){
            $this->$_view = $name;
        }

        if(file_exists('app/views/'.$this->$_view.'.php')){
            require_once 'app/views/'.$this->$_view.'.php';
        }
    }
}