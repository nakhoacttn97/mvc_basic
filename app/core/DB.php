<?php
class DB extends PDO{

    public function __construct($_connDb, $_user, $_pass){
        parent::__construct($_connDb, $_user, $_pass);
    }

    // some commonly used methods as get insert delete vv...
    public function getAll(string $sql, $params = null){
        $arr = null;
        if($params == null){
            $stmt = $this->query($sql);
            if($stmt){
                if($stmt->rowCount() > 0){
                    $arr = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                }
                $stmt->closeCursor();
            }
        }else{
            $stmt = $this->prepare($sql);
            if($stmt){
                $stmt->execute($params);
                if($stmt->rowCount() > 0){
                    $arr = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                }
                $stmt->closeCursor();
            }
        }
        return $arr;
    }
}