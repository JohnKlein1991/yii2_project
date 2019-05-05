<?php
namespace andrew_marhai\product;

use models\AbstractModel;

class Product extends AbstractModel
{
    private $db;
    public function connect()
    {
        $db = new PDO('sqlite:products.db');
        if($db){
            $this->db = $db;
            return true;
        } else {
            return false;
        }
    }

    public function saveToDB()
    {
        // TODO: Implement saveToDB() method.
    }

    public function loadFromDB()
    {
        if($this->db) {
            $sql = 'SELECT * FROM products';
            return $this->db->query($sql);
        } else {
            return false;
        }
    }
}