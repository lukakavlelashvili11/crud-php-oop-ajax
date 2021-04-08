<?php
    require('database/getcart.php');
    $cart=new getcart();
    $products=$cart->getcart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
     integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<center>
<table class="table w-75 mt-5">
    <tr>
      <th scope="col">#</th>
      <th scope="col">img</th>
      <th scope="col">title</th>
      <th scope="col">quantity</th>
      <th scope="col">sum</th>
      <th scope="col">delete</th>
    </tr>
<?php foreach($products as $product):?>
    <tr id=<?php echo 'id'.$product[0]?>>
      <th><?php echo $product[0]?></th>
      <td><img height="60" src=<?php echo 'img/'.$product[2]?>></td>
      <td><?php echo $product[1]?></td>
      <td><?php echo $product[6]?></td>
      <td><?php echo $product[7]?></td>
      <td><button onclick="remove(<?php echo $product[0]?>,<?php echo $product[6]?>)" class="btn btn-outline-danger">delete</button></td>
    </tr>
<?php endforeach;?>
</table>
</center>
</body>
<script>
    function remove(id,quantity){
        $.post('ajax.php',{
            id:id,
            action:'delete'
        },(data)=>{
            console.log(data);
        });
        $('#id'+id).hide('fast');
    }
</script>
</html>