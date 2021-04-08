<?php

    require('./database/getproducts.php');
    $getproducts=new getproducts();
    $products=$getproducts->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
     integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="w-100 p-2 d-flex justify-content-end mb-2">
    <div id="bask">
        <a href="cart.php">
            <img style="width:30px;" src="img/cart.png"/>
        </a>
        <div id="baskcount" class="quan">0</div>
        <div id="sum">
            <span id="summ">0</span> &#8382;
        </div>
    </div>
</div>
    <div class="w-100 d-flex justify-content-between flex-wrap">
    <?php
        foreach($products as $product):?>

            <div class="product container border" id="<?php echo 'id'.$product[0];?>">
            <center><img id="prod" src=<?php echo "img/".$product[2]?>></center>
            <div id="description">
                <p><?php echo $product[1]?></p>
            </div>
            <center>
            <div class="d-flex justify-content-between align-items-center"style="width:90%">
            <div><?php echo $product[3]?> &#8382;</div>
            <div class="d-flex w-50 justify-content-end align-items-center ">
            <div class=" d-flex justify-content-center w-75" id="<?php echo 'choosen'.$product[0];?>" style="display:none !important;">
            <input type="text" class="form-control w-75 p-1 h-25"   placeholder="quantity" id="<?php echo 'quantity'.$product[0];?>" value="1">
            <div class="add d-flex justify-content-between align-items-center"style="width:40%">
            <h4 role="button" onclick="addtocart(<?php echo $product[0];?>,<?php echo $product[3]?>)" style="color:green;">+</h4>
            <h4 role="button" onclick="closechoose(<?php echo $product[0];?>)" style="color:red;">x</h4>
            </div>
            </div>
            <img src="img/addtobasket.png" width="25" role="button" onclick="choose(<?php echo $product[0];?>)" id="<?php echo 'carticon'.$product[0];?>"/>
            </div>
            </div>
            </center>
        </div>
        <?php endforeach; ?>
        </div>
        <div style="position:fixed; bottom:25px;left:25px; display:none;"class="p-3 alert alert-success">product has added successfully!</div>
    
<script src="./js/index.js"></script>
</body>
</html>