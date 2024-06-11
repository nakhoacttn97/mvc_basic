<?php
class DModel{
    protected $_db = [];
    private $_connDb = "mysql:dbname=pdo_blogs_ecommerce;host=localhost;charset=utf8";
    private $_user = 'root';
    private $_pass = 'Destructor97@';

    public function __construct(){
        $this->_db = new DB($this->_connDb, $this->_user, $this->_pass);
    }
}