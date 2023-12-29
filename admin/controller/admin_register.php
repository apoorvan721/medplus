<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['register'])){
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['pass'];

$stmt=$admin->ret("SELECT * FROM `admin_login` WHERE `admin_mail`='$email'");
$row=$stmt->rowCount();
if($row>0){
    echo "<script>alert('Email Already exits');window.location='../pages/samples/register.php'</script>";
}
else{
    $secpassword=password_hash($password,PASSWORD_BCRYPT);
    $stmt=$admin->cud("INSERT INTO `admin_login`(`admin_name`, `admin_phone`, `admin_mail`, `admin_pass`) VALUES ('$name','$phone','$email','$secpassword')","save");
    echo "<script>alert('Registered Successfully');window.location='../pages/samples/login.php'</script>";
}
}
?>