<?php
class CategoryController extends BaseController{
    private $_cat;

    public function __construct(){
        $this->_cat = $this->model("CategoryModel");
    }

    public function show(){
        $data = $this->_cat->showtext();

        return $this->view(['arr' => $data], 'shared/layout');
    }
}