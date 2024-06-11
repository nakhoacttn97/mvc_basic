<?php
class CategoryModel extends DModel{

    public function __construct(){
        parent::__construct();
    }

    public function showtext(){
        $data = ['Show text of Category Model'];
        return $data;
    }
}