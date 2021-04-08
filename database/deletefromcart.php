<?php
require('db.php');
class deletefromcart{
    private $db;

    public function __construct(){
        $DB=new DB();
        $this->db=$DB->connection();
    }
    public function delete($product_id){
        $query="DELETE FROM cart WHERE product_id='$product_id'";
        $this->db->query($query);
    }
}