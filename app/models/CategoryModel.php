<?php
class CategoryModel extends DModel{

    public function __construct(){
        parent::__construct();
    }

    public function getCategories(){
        $sql = "SELECT * FROM categories";
        return $this->_db->getAll($sql);
    }
}