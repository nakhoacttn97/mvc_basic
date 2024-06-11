<?php
class DB extends PDO{
    private $_pdo;

    public function __construct($_connDb, $_user, $_pass){
        $this->_pdo = parent::__construct($_connDb, $_user, $_pass);
    }

    // some commonly used methods as get insert delete vv...
}