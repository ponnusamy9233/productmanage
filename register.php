<?php
 require "header.php";

 ?>

<?php 
$alert = false;
if(isset($_POST['register'])){

  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobile = $_POST['mobile'];
  if(empty($name && $username && $email && $password && $mobile)){
    $sql="";
  }
  else{

  $sql = "INSERT INTO register(name,username,password,email,mobile) VALUES('$name','$username','$email','$password','$mobile')";
  
  $result =$con->query($sql);
  if($result){
    $alert=true;
  }
  else{
    $alert=false;
  }

}
}

?>
    <div id="login">
        <h4>Register Page</h4>
        
    </div>
      <?php if($alert==true): ?>
        <p>Your registration is completed!</p>
        <center><a href="index.php" >go to login page</a></center>
        <?php else: ?>
          <center><a href="index.php" >go to login page</a></center>
          <?php endif; ?>
       <form action="register.php" method="post" id="lg-frm" >
           <label for="">Name</label>
           <input type="text" name="name" class="form-control" autocomplete="off"><br>
           <label for="">Username</label>
           <input type="text" name="username" class="form-control" autocomplete="off"><br>
           <label for="">Email</label>
           <input type="text" name="email" class="form-control" autocomplete="off"><br>
           <label for="">Password</label>
           <input type="number" name="password" class="form-control" autocomplete="off"><br>
           <label for="">Mobile</label>
           <input type="text" name="mobile" class="form-control"><br>
           <input type="submit" class="btn" name="register" value="Register">

       </form>
  </body>
</html>