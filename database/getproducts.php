<?php
require('db.php');
class getproducts{
    private $db;

    public function __construct(){
        $DB=new DB();
        $this->db=$DB->connection();
    }
    public function get(){
        $query="SELECT * FROM products";
        $products=$this->db->query($query);
        if($products->num_rows>0){
            return $products->fetch_all();
        }else{
            return "products does not exist!";
        }
    }
}