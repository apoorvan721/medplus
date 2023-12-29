<?php
include '../../config.php';

$admin=new Admin();

if(isset($_POST['add_cat'])){
$name=$_POST['name'];
$path1="med_pics/".basename($_FILES['img']['name']);
move_uploaded_file($_FILES['img']['tmp_name'], $path1);


$stmt=$admin->cud("INSERT INTO `category`(`category_name`,`category_img`) VALUES ('$name','$path1')","save");
echo "<script>alert('Added Successfully');window.location='../manage_category.php'</script>";
}
?>