<?php
include '../../config.php';
$admin=new Admin();
$delete_id=$_GET['did'];
$stmt=$admin->cud("DELETE FROM `manage_med` WHERE `med_id`='$delete_id'","delete");
echo "<script>alert('Deleted Successfully');window.location='../manage_medicines.php'; </script>";
?>