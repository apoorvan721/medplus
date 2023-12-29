<?php
include '../config.php';
$admin = new Admin();
if (!isset($_SESSION['id'])) {
    $admin->redirect('pages/samples/login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <?php include 'partials/navbar.php'?>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_settings-panel.html -->
      <?php include 'partials/settings-panel.php'?>
      <!-- partial -->


      <!-- partial:partials/_sidebar.html -->
      <?php include 'partials/sidebar.php'?>
      <!-- partial -->


            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 ">
                                    <h4 class="card-title">Manage Medicines</h4>
                                    <p class="card-description">
                                        Manage your Medicine Table
                                    </p>
                                </div>
                                <div class="col-lg-6  text-end">
                                    <a href="add_medicines.php"
                                        class="btn btn-block btn-primary btn-md font-weight-medium auth-form-btn">Add
                                        Medicine</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Medicine</th>
                                            <th>Medicine Name</th>
                                            <th>Medicine Description</th>
                                            <th>Medicine Category</th>
                                            <th>Medicine Quantity</th>
                                            <th>Medicine Price</th>
                                            <th>Medicine Manufacturer</th>
                                            <th>Medicine Expiry Date</th>
                                            <th>Medicine Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $admin->ret("SELECT * FROM `manage_med` INNER JOIN `category` ON manage_med.category_id=category.category_id");
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="controller/<?php echo $row['med_img'] ?>" alt="image" />
                                                </td>
                                                <td>
                                                    <?php echo $row['med_name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['med_desc'] ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    echo $row['category_name'];
                                                    
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['stock_quantity'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['med_price'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['med_manufacturer'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['med_expdate'] ?>
                                                </td>
                                                <td>
                                                        <?php if ($row['med_status'] == "1") {
                                                            echo "Available";
                                                        } elseif ($row["med_status"] == "2") {
                                                            echo "Not Available";
                                                        } ?>
                                                    </label>
                                                </td>
                                                <td><a href="update_medicines.php?uid=<?php echo $row[('med_id')] ?>"
                                                        class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="controller/delete_med.php?did=<?php echo $row[('med_id')] ?>"
                                                        class="btn btn-primary"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
                                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
                            BootstrapDash.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All
                            rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>