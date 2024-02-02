<?php session_start(); ?>
<?php $connect = new MySQLi('localhost', 'root', '', 'pro_new'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN</title>
  <script src="../public/ckeditor/ckeditor.js"  ></script>
</head>

<?php
if (isset($_POST['username'])) {
  $username=$_POST['username'];
  $password=md5($_POST['password']);
  $query="select *from admin where username='$username' and password='$password'";
  $result=$connect->query($query);
  if(mysqli_num_rows($result)==0){
    $alert="sai ten dang nhap hoac mat khau";
  }else{
    $result=mysqli_fetch_array($result);
    if($result['status']==0){
      $alert="tai khoan chua duoc kich hoat";
    }else{
      $_SESSION['admin']=$username;
      header("Refresh:0");
    }
  }
} ?>
<section>

<?php 
if(isset($_SESSION['admin'])) {
    include("admincontrolpanel.php");
 } else{
  include("loginadmin.php");
}
?>
</section>



</html>