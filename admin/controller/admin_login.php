<?php
include '../../config.php';
$admin = new Admin();
if(isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['pass'];

$stmt = $admin->ret("SELECT * FROM `admin_login` WHERE `admin_mail`='$email'");
$count=$stmt->rowCount();
if ($count > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbpass = $row['admin_pass'];
    if (password_verify($password, $dbpass)) {
        $_SESSION['id']=$row['admin_id'];
        echo "<script>alert('Login Successful');window.location='../index.php'</script>";
    } else {
        echo "<script>alert('Email or password is invalid');window.location='../pages/samples/login.php'</script>";
    }
} else {
    echo "<script>alert('Email or password is invalid');window.location='../pages/samples/login.php'</script>";
}
}
?>