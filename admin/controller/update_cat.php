<?php
include '../../config.php';
$admin=new Admin();

$update_id=$_POST['cat_id'];
$stmt=$admin->ret("SELECT * FROM `category` WHERE `category_id`='$update_id'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['update_cat'])){
    $name=$_POST['name'];
    $path2=$row['category_img'];
    $path1="med_pics/".basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $path1);
    if($path1=" "){
        $stmt=$admin->cud("UPDATE `category` SET `category_name`='$name',`category_img`='$path2' WHERE `category_id`='$update_id' ","update");
        echo "<script>alert('Updated Successfully');window.location='../manage_category.php'</script>";
    }
    else{
    $stmt=$admin->cud("UPDATE `category` SET `category_name`='$name',`category_img`='$path1' WHERE `category_id`='$update_id' ","update");
    echo "<script>alert('Updated Successfully');window.location='../manage_category.php'</script>";
    }
    }
    
?>