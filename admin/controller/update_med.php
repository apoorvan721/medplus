<?php
include '../../config.php';
$admin=new Admin();

$update_id=$_POST['med_id'];
$stmt=$admin->ret("SELECT * FROM `manage_med` WHERE `med_id`='$update_id'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update_med'])){
    $name=$_POST['name'];
    $description=$_POST['description'];
    $category=$_POST['category'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $manufacturer=$_POST['manufacturer'];
    $date=$_POST['date'];
    $status=$_POST['status'];
    $path2=$row['med_img'];
    $path1="med_pics/".basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $path1);

    if($path1=" "){
        $stmt=$admin->cud("UPDATE `manage_med` SET `med_name`='$name',`category_id`='$category',`med_desc`='$description',`med_price`='$price',`stock_quantity`='$quantity',`med_manufacturer`='$manufacturer',`med_expdate`='$date',`med_status`='$status',`med_img`='$path2' WHERE `med_id`='$update_id' ","update");
        echo "<script>alert('Updated Successfully');window.location='../manage_medicines.php'</script>";
    }
    else{
    
    $stmt=$admin->cud("UPDATE `manage_med` SET `med_name`='$name',`category_id`='$category',`med_desc`='$description',`med_price`='$price',`stock_quantity`='$quantity',`med_manufacturer`='$manufacturer',`med_expdate`='$date',`med_status`='$status',`med_img`='$path1' WHERE `med_id`='$update_id' ","update");

    echo "<script>alert('Updated Successfully');window.location='../manage_medicines.php'</script>";
    }
}
?>