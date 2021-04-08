<?php
require('db.php');
class getcart{
    private $db;

    public function __construct(){
        $DB=new DB();
        $this->db=$DB->connection();
    }
    public function getcart(){
        $query="SELECT * FROM products INNER JOIN cart ON products.id=cart.product_id";
        $cart=$this->db->query($query);
        return $cart->fetch_all();
    }
    public function getcartinfo(){
        $query="SELECT quantity,sum FROM cart";
        $cart=$this->db->query($query);
        return $cart->fetch_all();
    }
}