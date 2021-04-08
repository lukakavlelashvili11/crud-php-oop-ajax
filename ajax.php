<?php
if($_POST['action']=='save'){
    require('./database/addtocart.php');
    $add=new addtocart();
    $add->check($_POST['id'],$_POST['quantity'],$_POST['sum']);
}
if($_POST['action']=='delete'){
    require('./database/deletefromcart.php');
    $delete=new deletefromcart();
    $delete->delete($_POST['id']);
    return "okk";
}
if($_POST['action']=='getinfo'){
    require('./database/getcart.php');
    $cart=new getcart();
    echo json_encode($cart->getcartinfo());
}