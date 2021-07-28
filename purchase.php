<?php 
session_start();

require "header.php";?>
<?php 

$name; 
if(isset($_GET['purchase'])){
    $id = $_GET['purchase'];
    $sql = "SELECT * FROM products WHERE id= '$id'";

    $res = $con->query($sql) or die(mysqli_error($sql));
    while($row = mysqli_fetch_assoc($res)){
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $sell_price = $row['selling_price'];
    }
}
?>
<?php


if(isset($_POST["addcart"]))
{
    if($_SESSION["cart"])
    {
      $id_array = array_column($_SESSION["cart"],'id');

      if(!in_array($_GET['id'],$id_array))
      {
         $index = count($_SESSION["cart"]);
         $item = array(
          'id' => $_GET['purchase'],
          'product_name' => $_POST['product_name'],
          'selling_price' =>$_POST['selling_price'],
          'product_qty' =>$_POST['product_qty'],
        
      );
          $_SESSION["cart"][$index] = $item;
          echo "<script>
          alert('product added...')
          </script>";
          header('location:billing.php');
      }
      else{
          echo "<script>alert('Already added...')</script>";
          header('location:billing.php');
      }
    }
    else{
        $item = array(
            'id' => $_GET['purchase'],
            'product_name' => $_POST['product_name'],
            'selling_price' =>$_POST['selling_price'],
            'product_qty' =>$_POST['product_qty'],
           
        );
        $_SESSION["cart"][0] = $item;
         echo "<script>
         alert('product added...')
         </script>";
         header('location:billing.php');
    }
}

?>

   <div id="login">
        <h4>Product Details</h4>
    </div>


<form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST"  enctype="multipart/form-data">
        <div class="container">
        <div class="row" style="margin-top: 50px;">
        
        <div class="col-sm-12">
        <h5>Product name:<b><?php echo $product_name;?></b></h5><br>
        <h6>Original Price:<b><?php echo $product_price;?></b></h6><br>
        <h6>Selling Price:<strong><?php echo $sell_price;?>RS</strong></h6><br>
        <h6>Quantity:</h6><input type="number" name="product_qty" required ><br>
        <input type="hidden" name="product_name" value="<?php echo $product_name;?>">
        <input type="hidden" name="selling_price" value="<?php echo  $sell_price;?>">

        <br>
        <button type="submit" class="btn btn-default" name="addcart">Add Billing</button>
                    </div>
                </div>
            </div>
</div>
    