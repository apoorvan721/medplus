<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['register'])){
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['pass'];
$address=$_POST['address'];

$stmt=$admin->ret("SELECT * FROM `manage_customers` WHERE `customer_email`='$email'");
$row=$stmt->rowCount();
if($row>0){
    echo "<script>alert('Email Already exits');window.location='../register.php'</script>";
}
else{
    $secpassword=password_hash($password,PASSWORD_BCRYPT);
    $stmt=$admin->cud("INSERT INTO `manage_customers`(`customer_name`, `customer_phone`, `customer_email`, `customer_pass`, `customer_address`) VALUES ('$name','$phone','$email','$secpassword','$address')","save");
    echo "<script>alert('Registered Successfully');window.location='../login.php'</script>";
}
}
?>