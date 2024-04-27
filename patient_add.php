<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>php-crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-with-overlay-image.css">
</head>

<body>
    <div class="d-block" style="height: 30px;">
        <div class="container" style="height: 30px;">
            <div class="row" style="height: 30px;">
                <div class="col-md-12" style="height: 30px;">
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-block" style="height: 30px;">
        <div class="container" style="height: 30px;">
            <div class="row" style="height: 30px;">
                <div class="col-md-12" style="height: 30px;">
                    <div></div>
                </div>
            </div>
        </div>
    </div><div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Register Patient</h3>
                                </div>
                                <h6 class="h5 mb-0">Let's admit the Patient.</h6>
                                <p class="text-muted mt-2 mb-5">Fill out all details</p>
                                <form method="post">
                                <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" />
                                        <div class="form-group">
                                        </div>
          
                                    
                                        <label for="addresss">Address</label>
                                        <input type="address" class="form-control" name="address"/>
                                    </div>
                                  <br>
                                    <button type="submit" class="btn btn-theme" name="submit" >Register</button>
                                    <a href = "./patient.php" class="btn btn-danger" >Go Back</a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">Add Patient Records</h4>
                                    <p class="lead text-white">Add your patient records to the hospital database.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
            <!-- end row -->
        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <?php
include "connection.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];

    {
    // Current date
    $currentDate = date("Y-m-d");
    
    $q = "INSERT INTO `tbl_patient`(`name`, `address`, `joindate`) 
          VALUES ('$name', '$address', '$currentDate')";
    
    $query = mysqli_query($conn, $q);
    
    if ($query) {
        echo "<center>New record created successfully</center>";
    } else {
        echo "Error: " . $q . "<br>" . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);
}
}
?>

</body>

</html>