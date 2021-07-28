<?php 
session_start();
ob_start();

require "header.php";?>

<?php

if(isset($_SESSION["cart"])){
    
    $carts = $_SESSION["cart"];
  
  }

?>

<div class="login-wrapper">
    <center><h4>AM MARKET</h4></center>
    <center><i>let's start to purchase! it's begins</i></center><br>

    <div style="margin-left: 30px;">
        <h5>Customer Details</h5>
        <em>Customer name:<b><?php echo $_SESSION['username']?></b></em><br>
        <em>Customer Email:<b><?php echo $_SESSION['email']?></b></em><br>
        <em>Customer Mobile:<b><?php echo $_SESSION['mobile']?></b></em>
    </div>
    <div style="float: right;margin-right: 60px;margin-top: -100px;">
        <address>
            <i>Address Details</i><br>
            <b>A/12C,Anna Street,</b><br>
            <b>7-th cross,</b><br>
            <b>Thiyagarayar-nagar,</b><br>
            <b>chennai-600028</b>
            <br>
        </address>
    </div>
</div>

<table class="table table bordered" style="margin-top: 20px;">
   <tr>
      <th>Customer Name</th>
      <th>Product Name</th>
      <th>Selling Price</th>
      <th>Quantity</th>
      <th>Total</th>
     
   </tr>
   <tbody>
      <?php 
  if(!empty($carts)){
     $all_total=0;
     foreach($carts as $keys=>$values){
        $total = $values['selling_price'] * $values['product_qty'];
        $all_total+=$total;
        echo "
            <tr>
              <td>{$_SESSION['username']} </td>
              <td>{$values["product_name"]}</td>
              <td>{$values["selling_price"]}</td>
              <td>{$values["product_qty"]}</td>
              <td>{$total}</td>
              
            </tr>
             ";
     }
         echo "
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td>{$all_total}</td>
              </tr>
         
              ";
     
   }
     else{
    
     
  }

    ?>    
   </tbody>
</table>


