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
    <div class="card">
        <div class="card-body">
            <nav class="navbar navbar-expand-md bg-body py-3">
                <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img src="assets/images/stbonaventure.png" width = "75px" height ="100px"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                            </svg></span><span>SJSBH Admin</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item"></li>
                            <li class="nav-item"></li>
                            <li class="nav-item"></li>
                        </ul><a href = "index.php" class="btn btn-danger" >LOGOUT</a>
                    </div>
                </div>
            </nav>
            <p class="text-center card-text">ADMIN PORTAL</p>
        </div>
    </div>
    <div class="container"></div>
    <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>LAST NAME</th>
        <th>FIRST NAME</th>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>JOINING DATE</th>
        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "connection.php";
        $sql = "select * from tbl_admin";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <td>$row[id]</td>
        <td>$row[name_last]</td>
        <td>$row[name_first]</td>
        <td>$row[email]</td>
        <td>$row[pword]</td>
        <td>$row[joindate]</td>
        <td>
                  <a class='btn btn-success' href='edit.php?id=$row[id]'>Edit</a>
                  <a class='btn btn-danger' href='delete.php?id=$row[id]'>Delete</a>
                </td>
      </tr>
      ";
        }
      ?>
    </tbody>
  </table>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>