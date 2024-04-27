<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Record - php-crud</title>
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
    </div>
    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Edit Record</h3>
                                    </div>
                                    <h6 class="h5 mb-0">Update your details.</h6>
                                    <p class="text-muted mt-2 mb-5">Modify your information</p>
                                    <?php
                                    include "connection.php";

                                    $record_id = $_GET['id'];
                                    $query = "SELECT * FROM tbl_admin WHERE id = $record_id";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);

                                    if (mysqli_num_rows($result) > 0) {
                                    ?>
                                        <form method="post">
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                <input type="text" class="form-control" name="firstName" value="<?php echo $row['name_first']; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="lastName">Surname</label>
                                                <input type="text" class="form-control" name="lastName" value="<?php echo $row['name_last']; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" />
                                            </div>
                                            <div class="form-group mb-5">
                                                <label for="passwd">Password</label>
                                                <input type="password" class="form-control" name="passwd" value="<?php echo $row['pword']; ?>" />
                                            </div>
                                            <input type="hidden" name="record_id" value="<?php echo $record_id; ?>">
                                            <button type="submit" class="btn btn-theme" name="update">Update</button>
                                            <a href = "./panel.php" class="btn btn-danger" name="back">Back</a>
                                        </form>
                                    <?php
                                    } else {
                                        echo "Record not found.";
                                    }

                                    if (isset($_POST['update'])) {
                                        $record_id = $_POST['record_id'];
                                        $fname = $_POST['firstName'];
                                        $lname = $_POST['lastName'];
                                        $email = $_POST['email'];
                                        $passwd = $_POST['passwd'];

                                        $q = "UPDATE tbl_admin SET name_first='$fname', name_last='$lname', email='$email', pword='$passwd' WHERE id=$record_id";

                                        $query = mysqli_query($conn, $q);

                                        if ($query) {
                                            echo "Record updated successfully";
                                            header('location:./panel.php');
                                        } else {
                                            echo "Error updating record: " . mysqli_error($conn);
                                        }

                                        mysqli_close($conn);
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">Update Admin Records</h4>
                                        <p class="lead text-white">Update useradmin records here.</p>
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
</body>

</html>
