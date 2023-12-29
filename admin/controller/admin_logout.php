<?php
include '../../config.php';
$admin=new Admin();
session_destroy();
unset($_SESSION['id']);
echo "<script>alert('Logged out Successfully');window.location='../pages/samples/login.php'</script>";