<?php
class CategoryModel{

    public function __construct(){
        echo "Require Category model Success !";
    }

    public function showtext(){
        $data = ['Show text of Category Model'];
        return $data;
    }
}