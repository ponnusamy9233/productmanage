<?php
ob_start();
session_start();
 require "header.php";?>

 <?php 


if(isset($_POST['create'])){
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $selling_price=$_POST['selling_price'];

    $create_sql = "INSERT INTO products (product_name,product_price,selling_price)VALUES(' $product_name','$product_price','$selling_price')";

    $create_res = $con->query($create_sql);
    if($create_res){
        header('location:products.php');
    }
}





?>
   <div id="login">
        <h4>Create products</h4>
    </div>
      
         <form action="products.php" method="POST" id="left-frm">
         <label >Poduct Name</label>
         <input type="text" name="product_name" ><br>
         <label >Product Price</label>
         <input type="number" name="product_price"  ><br>
         <label >Selling Price</label>
         <input type="number" name="selling_price"   ><br><br>
         <input type="submit" name="create" class="create_btn" value="Create Product">
           <br>
        <div >
                <table id="pro_list" class="table" border="1">
                <thead >
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Selling Price</th>
                        <th>Purchase</th>
                    </tr>
                </thead>
                <?php 
                 $show_sql = "SELECT * FROM products";
                 $show_pro_res = $con->query($show_sql) or die(mysqli_error($show_sql));
                  while($row=mysqli_fetch_assoc($show_pro_res)){
                      $show_pr_id = $row['id'];
                      $show_prname = $row['product_name'];
                      $show_price = $row['product_price'];
                      $show_sell_price = $row['selling_price'];
                ?>
               <tbody>
                    <tr>
                        <td><?php echo $show_pr_id;?></td>
                        <input type="hidden" name="product_name" value="<?php echo $show_prname;?>">
                        <input type="hidden" name="selling_price" value="<?php echo $show_sell_price;?>">
                        <td><?php echo $show_prname;?></td>
                        <td><?php echo $show_price;?></td>
                        <td><?php echo $show_sell_price;?></td>
                        <td><a href="purchase.php ?purchase=<?php echo $show_pr_id ?>" name="purchase">Purchase</a></td>
                    </tr>
               </tbody>
               <?php } ?>
                </table>
        </div> 

