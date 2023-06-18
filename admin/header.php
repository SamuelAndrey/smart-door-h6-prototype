<?php
session_start();

require_once __DIR__ . "../../database.php";
require_once __DIR__ . "/function.php";


if (!$_SESSION['login']) {
  header('Location:login.php');
}

# Template alert javascript
$path = $_SERVER['REQUEST_URI'];
$filename = basename($path);
# $filename = substr(strrchr($path, "/"), 1); opsi lain

$berhasil = "<script>alert('Berhasil menambah data!');document.location.href = '" . $filename . "';</script>";
$gagal = "<script>alert('Gagal menambah data!');</script>";

# Tambah data jadwal
if (isset($_POST['tambah_jadwal'])) echo (tambah_jadwal($_POST) > 0) ? $berhasil : $gagal;

# Tambah data mahasiswa

# Tambah data staf

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Smart Door H6</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>

    #layoutSidenav_content{
    
      
			background: radial-gradient(ellipse at 10% 90%, #D3E0EA 0%, transparent 55%),
				radial-gradient(ellipse at 90% 90%, #A4EBF3 0%, transparent 55%),
				radial-gradient(ellipse at 90% 10%, #CCF2F4 0%, transparent 55%),
				radial-gradient(ellipse at 10% 10%, #F4F9F9 0%, transparent 55%) ;
		}
    .datatable-input {
      display: none !important;
      }

	</style>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-light bg-light ">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="logout.php"><img src="../assets/image/LOGO WEB.png" alt="" srcset="" style="height:2.5em; width:auto"></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
     
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
       

              <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
              </a>
              <a class="nav-link" href="data_jadwal.php">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Jadwal
              </a>
              <a class="nav-link" href="data_mahasiswa.php">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Mahasiswa
              </a>
              <a class="nav-link" href="data_staf.php">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Staf
              </a>
    
          </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: </div>
            <?php echo $_SESSION['username']; ?>
        </div>
      </nav>
    </div>