<?php
abstract class BaseController{
    protected string $_layout = 'layout';
    protected $_data = NULL;
	protected $_view = '';
	protected $_errors = 'Error';

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

    protected function view(array $data, string $_name=NULL){
        
        extract($data);

        if($_name != NULL){
            $this->_view = $_name;
        }

        if(file_exists('app/views/'.$this->_view.'.php')){
            require_once 'app/views/'.$this->_view.'.php';
        }
    }

    protected function render(array $_data){
        header('Content-Type: application/json');
        return json_encode($_data);
        //echo json_encode($_data);
    }
}