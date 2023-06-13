<?php

require_once __DIR__ . "/database.php";
require_once __DIR__ . "/helper/ImageProfile.php";
require_once __DIR__ . "/helper/Query.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart Door H6</title>

  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">

  <script type="text/javascript" src="./assets/js/datetime.js"></script>
  <script src="./assets/js/jquery-1.11.3.min.js"></script>

</head>

<body onload=display_ct();>

  <div class="lines">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <a href="./scanner/scannerCheckout.php" id="back">
          <img src="./assets/image/LOGO WEB.png" style="height:5em; margin-top:-2px; float:left">
        </a>
      </div>
      <div class="col">
        <p id='ct' class="date"></p>
        <p id='ct1' class="clock"></p>
      </div>
    </div>

    <?php
    # QR CODE VALIDATION
    # VIEW THE ACCESS
    # @samuel andrey

    $url = "$_POST[input_qr]";
    $input_qr = substr(strrchr($url, "/"), 1);

    $time_now = date('H');
    $date_now = date("Y-m-d");

    $sql = Query::validateStudent($date_now, $time_now, $input_qr, $conn);

    if (mysqli_num_rows($sql) < 1) {

      # checking of access staff
      $sql_staf = mysqli_query($conn, "SELECT * FROM staf WHERE npp = '$input_qr'");

      switch (mysqli_num_rows($sql_staf)) {
        case 1:

          $role = "staf";
          $profile_image = ImageProfile::imageStaf($input_qr);
          $row = mysqli_fetch_array($sql_staf); ?>

          <div class="row">
            <div class="col greet">
              <span class="stroke" id='gret'></span>
              <span><?= $row['nama'] ?></span>
            </div>
          </div>

          <!-- card of data staff -->
          <div class="row">
            <div class="col">
              <div class="card profile mx-auto" style="max-width: 120vh;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="<?= $profile_image ?>" class="img-fluid rounded-start" alt="anjasfoto" style="height:100%; width:100%">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body width:100%">
                      <h5 class="card-title"><?= $row['nama'] ?></h5>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <p class="card-text small"><small>NPP</small></p>
                          <p class="card-text big"><?= $row['npp'] ?></p>
                        </li>
                        <li class="list-group-item">
                          <p class="card-text small"><small>NIDN</small></p>
                          <p class="card-text big"><?= $row['nidn'] ?></p>
                        </li>
                        <li class="list-group-item">
                          <p class="card-text small"><small>Jabatan Fungsional</small></p>
                          <p class="card-text big"><?= $row['jabatan_fungsional'] ?></p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end card of data staff -->

      <?php
          # INSERT LOG STAF
          Query::insertLog($row['npp'], 'check in', 'staf', $conn);
          break;

        default:
          echo "<div class='row'>
                    <div class='col greet'>
                        <h1>MAAF, DATA TIDAK DITEMUKAN...</h1>
                        <i>Anda tidak terdaftar pada akses ruangan.</i>
                    </div>
                </div>";
          break;
      }
    } else {

      $role = "mahasiswa";
      $profile_image = ImageProfile::imagetStudent($input_qr);
      $row = mysqli_fetch_array($sql); ?>

      <div class="row">
        <div class="col greet">
          <span class="stroke" id='gret'></span>
          <span><?= $row['nama'] ?></span>
        </div>
      </div>

      <!-- card of data student -->
      <div class="row">
        <div class="col">
          <div class="card profile mx-auto" style="max-width: 120vh;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?= $profile_image ?>" class="img-fluid rounded-start" alt="anjasfoto" style="height:100%; width:100%">
              </div>
              <div class="col-md-8">
                <div class="card-body width:100%">
                  <h5 class="card-title"><?= $row['nama'] ?></h5>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <p class="card-text small"><small>NIM</small></p>
                      <p class="card-text big"><?= $row['nim'] ?></p>
                    </li>
                    <li class="list-group-item">
                      <p class="card-text small"><small>Progam Studi</small></p>
                      <p class="card-text big"><?= $row['progdi'] ?></p>
                    </li>
                    <li class="list-group-item">
                      <p class="card-text small"><small>Jadwal</small></p>
                      <p class="card-text big"><?= $row['tanggal'] ?></p>
                    </li>
                    <li class="list-group-item">
                      <p class="card-text small"><small>Sesi</small></p>
                      <p class="card-text big"><?= $row['jam_masuk'] . ".00 - " . $row['jam_keluar'] . ".00" ?></p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end card of data student -->

    <?php
      # INSERT LOG STUDENT
      Query::insertLog($row['nim'], 'check out', 'mahasiswa', $conn);
    } ?>

  </div>

  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script>
    // trigger back to scanner
    window.addEventListener('load', function() {
      setTimeout(function() {
        var tombol = document.getElementById('back');
        tombol.click();
      }, 5000);
    });
  </script>
</body>

</html>