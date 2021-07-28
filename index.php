<?php
ob_start();
session_start();
 require "header.php";
?>
<?php
$db_username="";
$db_password="";
$user_id='';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $chk_sql = "SELECT * FROM register WHERE username='$username' ";

    $chk_result=$con->query($chk_sql);
    while($row = mysqli_fetch_assoc($chk_result)){
        $db_username = $row['username'];
        $db_password = $row['password'];
        $db_email = $row['email'];
        $db_mobile = $row['mobile'];
        $user_id = $row['id'];
      }
      if($username !== $db_username && $password !== $db_password){

        echo "<script> alert('your username and password not register') </script>";
       
      }
      elseif($username == $db_username && $password == $db_password){
 
        header("location:products.php");
        $_SESSION['username']  = $db_username;
        $_SESSION['email'] = $db_email;
        $_SESSION['mobile'] = $db_mobile;
      }
}

?>
    <div id="login">
        <h4>Login Page</h4>
    </div>
     
    <div>
        <form action="index.php" method="POST" id="lg-frm">
          <input type="hidden" value="<?php echo $user_id;?>">
         <label for="usename">Username</label>
         <input type="text" name="username" id="username" class="form-control"><br>
         <label for="password">Password</label>
         <input type="password" name="password" id="password"  class="form-control">
         <a href="register.php">You are not register pls Regitser!</a><br>
         <input type="submit" class="btn" value="Login" name="login">
         

       

        </form>
    </div>
  </body>
</html>