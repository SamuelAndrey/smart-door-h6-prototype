<?php
# Smart Door H6
# @samuel andrey

require_once __DIR__ . "/../database.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $pass = md5($password);

  $sql = "SELECT * FROM admin WHERE username = '$username' && password = '$pass'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['login']        = TRUE;
    $_SESSION['id']           = $row['idadmin'];
    $_SESSION['username']     = $row['username'];
    $_SESSION['namalengkap']  = $row['namalengkap'];
    header('Location:./index.php');
  } else {
    $alert = true;
  }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Smart Door H6</title>
  <link href="css/styles.css" rel="stylesheet" />

  <style>
    @font-face {
      font-family: "Oswald";
      src: url('../assets/fonts/Oswald-VariableFont_wght.ttf') format('truetype');
    }
    body {
     
      display: table;
      width: 100%;
      height: 100%;

      line-height: 1.6;
      position: relative;
      overflow: hidden;

      background-color: #CCF2F4 ;
			background: radial-gradient(ellipse at 10% 90%, #D3E0EA 0%, transparent 55%),
				radial-gradient(ellipse at 90% 90%, #A4EBF3 0%, transparent 55%),
				radial-gradient(ellipse at 90% 10%, #CCF2F4 0%, transparent 55%),
				radial-gradient(ellipse at 10% 10%, #F4F9F9 0%, transparent 55%) ;

      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
      height: 100vh;
    }

    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }


  </style>
</head>

<body >
  <nav class="sb-topnav navbar navbar-expand navbar-light bg-transparent ">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="../"><img src="../assets/image/LOGO WEB.png" alt="" srcset="" style="height:2.5em; width:auto"></a>
      <!-- Sidebar Toggle-->
      <!-- Navbar Search-->

      
  </nav>

        <div class="container d-flex  align-items-center">
          <div class="row w-100  justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-3 lg-5 " style="top:35%">
                <div class="card-header">
                  <h3 class="text-center my-4" style=" font-family: 'Oswald';">LOGIN ADMIN</h3>
                </div>
                <div class="card-body">
                  <?php if (isset($alert)) : ?>
                    <div class="alert alert-danger" role="alert"><strong class="fw-bold">Password atau username tidak sesuai.</strong> coba masukkan lagi!</div>
                  <?php endif; ?>
                  <form action="" method="post">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputEmail" type="text" placeholder="Username" name="username" />
                      <label for="inputEmail">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" />
                      <label for="inputPassword">Password</label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                      <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                      <button class="btn btn-primary" type="submit" style="font-family: 'Oswald';width:100%; margin-top:1em; padding:.4em; font-size:1.2em; font-weight:700;">LOGIN</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
</body>

</html>