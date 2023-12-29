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
  <title>Medplus </title>
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
    <?php include 'partials/navbar.php' ?>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_settings-panel.html -->
      <?php include 'partials/settings-panel.php' ?>
      <!-- partial -->


      <!-- partial:partials/_sidebar.html -->
      <?php include 'partials/sidebar.php' ?>
      <!-- partial -->


      <div class="main-panel">
        <div class="content-wrapper">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 ">
                  <h4 class="card-title">Manage Customers</h4>
                  <p class="card-description">
                    Manage your Customers
                  </p>
                </div>

              </div>

              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Customer Profile</th>
                      <th>Customer Name</th>
                      <th>Customer Phone</th>
                      <th>Customer Email</th>
                      <th>Customer Address</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $stmt = $admin->ret("SELECT * FROM `manage_customers`");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <tr>
                        <td class="py-1">
                          <img src="controller/<?php echo $row['customer_img'] ?>" alt="image" />
                        </td>
                        <td>
                          <?php echo $row['customer_name'] ?>
                        </td>
                        <td>
                          <?php echo $row['customer_phone'] ?>
                        </td>

                        <td>
                          <?php echo $row['customer_email']; ?>
                        </td>
                        <td>
                          <?php echo $row['customer_address'] ?>
                        </td>
                      
                        <td><a href="controller/delete_user.php?did=<?php echo $row[('customer_id')] ?>"
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