<?php require_once __DIR__ . "/../database.php" ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Door Lock H6</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="icon"  href="../assets/img/logo.png">

  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <style>
  * {
    font-family: 'poppins', sans-serif;
  }
  </style>
</head>

<body>
<div class="container-fluid">
  <div class="row mt-5">
    <div class="col-9">
      <h5 class="text-bold">JADWAL AKSES MASUK HARI INI</h5>
      <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">Nim</th>
            <th scope="col">Nama</th>
            <th scope="col">Progdi</th>
            <th scope="col">Sesi</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Ruangan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          # menampilkan data mahasiswa
          $time_now = date('H');
          $date_now = date("Y-m-d");
          $data = query("SELECT * FROM mahasiswa 
                         INNER JOIN jadwal
                         ON jadwal.id_mhs = mahasiswa.id_mhs
                         WHERE '$date_now' = tanggal &&
                         $time_now >= jam_masuk &&
                         $time_now <= jam_keluar-1");

          foreach($data as $row) : ?>
              <tr>
                  <td><?= $row['nim']?></td>
                  <td><?= $row['nama']?></td>
                  <td><?= $row['progdi']?></td>
                  <td><?= $row['jam_masuk'] . ".00 - " . $row['jam_keluar'] . ".00"?></td>
                  <td><?= $row['tanggal']?></td>
                  <td><?= $row['ruangan']?></td>
              </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-3">
      <div class="card card-danger pt-3">
        <div class="card-heading text-center">
          <h5>Arakan QR Code Ke Kamera</h5>
        </div>
        <div class="card-body text-center" >
          <canvas class="rounded-2 border border-dark"></canvas>
          <select class="form-select"></select>
        </div>
        <div class="card-footer">
            <center><a class="btn btn-danger" href="../">Kembali</a></center>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Js Lib -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/qrcodelib.js"></script>
<script type="text/javascript" src="js/webcodecamjquery.js"></script>
<script type="text/javascript">
    var arg = {
        resultFunction: function(result) {
            var redirect = '../validation.php';
            $.redirectPost(redirect, {input_qr: result.code});
        }
    };
    
    var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
    decoder.buildSelectMenu("select");
    decoder.play();
    /*  Without visible select menu
        decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
    */
    $('select').on('change', function(){
        decoder.stop().play();
    });

    // jquery extend function
    $.extend(
    {
        redirectPost: function(location, args)
        {
            var form = '';
            $.each( args, function( key, value ) {
                form += '<input type="hidden" name="'+key+'" value="'+value+'">';
            });
            $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
        }
    });

</script>
</body>
</html>