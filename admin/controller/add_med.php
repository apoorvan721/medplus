<?php
include '../../config.php';

$admin=new Admin();

if(isset($_POST['add_med'])){
$name=$_POST['name'];
$description=$_POST['description'];
$category=$_POST['category'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$manufacturer=$_POST['manufacturer'];
$date=$_POST['date'];
$status=$_POST['status'];
$path1="med_pics/".basename($_FILES['img']['name']);
move_uploaded_file($_FILES['img']['tmp_name'], $path1);


$stmt=$admin->cud("INSERT INTO `manage_med`(`med_name`,`med_desc`,`category_id`, `med_price`, `stock_quantity`, `med_manufacturer`, `med_expdate`, `med_status`,`med_img`) VALUES ('$name','$description','$category','$quantity','$price','$manufacturer','$date','$status','$path1')","save");
echo "<script>alert('Added Successfully');window.location='../manage_medicines.php'</script>";
}
?>