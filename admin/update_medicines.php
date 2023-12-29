<?php
include '../config.php';
$admin = new Admin();
$update_id = $_GET['uid'];
$stmt = $admin->ret("SELECT * FROM `manage_med` INNER JOIN `category` ON manage_med.category_id=category.category_id WHERE manage_med.med_id='$update_id'");
$update_row = $stmt->fetch(PDO::FETCH_ASSOC);

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
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Medicines</h4>
                  <p class="card-description">
                    Add the medicines details here
                  </p>
                  <form class="forms-sample" action="controller/update_med.php" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="name">Medicine Name</label>
                      <input type="text" class="form-control" name="name"
                        value="<?php echo $update_row['med_name']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="description">Medicine Description</label>
                      <input type="text" class="form-control" name="description"
                        value="<?php echo $update_row['med_desc']; ?>">
                    </div>


                    <div class="form-group">
                      <label for="category">Medicine Category</label>
                      <select class="form-control" name="category">
                        <option value="<?php echo $update_row['category_id'] ?>" >
                          <?php echo $update_row['category_name'] ?>
                        </option>

                        <?php
                        $stmt1 = $admin->ret("SELECT * FROM `category`");
                        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value=" <?php echo $row1['category_id'] ?> ">
                            <?php echo $row1['category_name'] ?>
                          </option>

                          <?php
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="quantity">Medicine Quantity</label>
                      <input type="number" class="form-control" name="quantity"
                        value="<?php echo $update_row['stock_quantity']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="price">Medicine Price</label>
                      <input type="number" class="form-control" name="price"
                        value="<?php echo $update_row['med_price']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="price">Medicine Manufacturer</label>
                      <input type="text" class="form-control" name="manufacturer"
                        value="<?php echo $update_row['med_manufacturer']; ?>">
                    </div>
                    <input type="hidden" class="form-control" name="med_id" value="<?php echo $update_id ?>">
                    <div class="form-group">
                      <label for="date">Medicine Expire Date</label>
                      <input type="date" class="form-control" name="date"
                        value="<?php echo $update_row['med_expdate']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="status">Medicine Status</label>
                      <select class="form-control" name="status">
                        <option value="<?php echo $update_row['med_status']; ?>" >
                          <?php if($update_row['med_status']=="1"){
                            echo "Available";
                          }
                            elseif($update_row["med_status"]== "2"){
                              echo "Not Available";
                          } ?>
                        </option>
                        <option value="1">Available</option>
                        <option value="2">Not Available</option>

                      </select>
                    </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img" class="form-control file-upload-info">
                    </div>

                    <button type="submit" class="btn btn-primary me-2" name="update_med">Update </button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
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
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights
              reserved.</span>
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
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
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
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>