<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>php-crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-with-overlay-image.css">
    <link rel="stylesheet" href="assets/css/Navbar-With-Button-icons.css">
</head>

<body>
<?php
    include "connection.php";

    $email = $pword = "";
    $email_err = $pword_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter e-mail.";
        } else {
            $email = trim($_POST["email"]);
        }

        if (empty(trim($_POST["pword"]))) {
            $pword_err = "Please enter your Password.";
        } else {
            $pword = trim($_POST["pword"]);
        }

        if (empty($email_err) && empty($pword_err)) {
            $sql = "SELECT email, pword FROM tbl_admin WHERE email = ?";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("s", $param_email);

                $param_email = $email;

                if ($stmt->execute()) {
                    $stmt->store_result();

                    if ($stmt->num_rows == 1) {
                        $stmt->bind_result($email, $stored_pword);
                        if ($stmt->fetch()) {
                            if ($pword === $stored_pword) {
                                session_start();

                                $_SESSION["email"] = $email;

                                if (isset($_POST['admin_login'])) {
                                    // Admin login button clicked
                                    header("location: panel.php");
                                    exit;
                                } elseif (isset($_POST['user_login'])) {
                                    // User login button clicked
                                    header("location: patient.php");
                                    exit;
                                }
                            } else {
                                $pword_err = "The password you entered was not valid.";
                            }
                        }
                    } else {
                        $email_err = "No account found with that email.";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                $stmt->close();
            }
        }
    }
    $conn->close();
    ?>
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
                                        <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                    </div>

                                    <h6 class="h5 mb-0">Welcome to SJSBH Panel</h6>
                                    <p class="text-muted mt-2 mb-5">Enter your E-mail and Password, then choose whether to login as admin or access patient portal.</p>

                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                            <label for="exampleInputEmail1">E-mail</label>
                                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email; ?>">
                                            <span class="help-block"><?php echo $email_err; ?></span>
                                        </div>
                                        <div class="form-group mb-5 <?php echo (!empty($pword_err)) ? 'has-error' : ''; ?>">
                                            <label for="exampleInputpword1">Password</label>
                                            <input type="password" name="pword" class="form-control" id="exampleInputpword1">
                                            <span class="help-block"><?php echo $pword_err; ?></span>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-theme" name="user_login">Login</button>
                                        <button type="submit" class="btn btn-theme" name="admin_login" hidden ="true">Login (ADMIN)</button>
                                        <a href="signup.php" class="btn btn-success" hidden = "true">Sign Up</a>

                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class=""></div>
                                    <div class="account-testimonial">
                                    <img class = "account-testimonial" src="assets/images/stbonaventure.png"/>
                                        <h4 class="text-black mb-4">Patient Management System</h4>
                                        <p class="lead text-black">A Web-based solution for record-keeping & patient management.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- Row -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
