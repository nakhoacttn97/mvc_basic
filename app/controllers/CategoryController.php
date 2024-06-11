<?php
class CategoryController extends BaseController{
    private $_cat;

    public function __construct(){
        $this->_cat = $this->model("CategoryModel");
    }

    public function index(){
        $data = $this->_cat->getCategories();

        return $this->view(['arr' => $data], 'shared/layout');
    }
}