<?php
include '../../config.php';
$admin=new Admin();
$delete_id=$_GET['did'];
$stmt=$admin->cud("DELETE FROM `category` WHERE `category_id`='$delete_id'","delete");
echo "<script>alert('Deleted Successfully');window.location='../manage_category.php'; </script>";
?>