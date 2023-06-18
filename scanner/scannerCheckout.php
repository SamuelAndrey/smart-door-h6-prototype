<?php

require_once __DIR__ . "/../database.php";
require_once __DIR__ . "/../helper/Query.php";

$time_now = date('H');
$date_now = date("Y-m-d");

$counterFree = Query::counterStudentFree($date_now, $conn);
$counterStudent = Query::counterStudent($date_now, $conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check Out</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">

  <script type="text/javascript" src="../assets/js/datetime.js"></script>
  <script src="./js/jquery.js"></script>

  <style>
		body{
			display: table;
			width: 100%;
			height: 100%;

			line-height: 1.6;
			position: relative;
			overflow: hidden;

			background-color: #170d24;
			background: radial-gradient(ellipse at 10% 90%, #E26868 0%, transparent 55%),
				radial-gradient(ellipse at 90% 90%, #F48484 0%, transparent 55%),
				radial-gradient(ellipse at 90% 10%, #BD574E 0%, transparent 55%),
				radial-gradient(ellipse at 10% 10%, #606470 0%, transparent 55%) ;

			background-size: 400% 400%;
			animation: gradient 15s ease infinite;
			height: 100vh;
		}
	</style>

  <script type="text/javascript">
    $(document).ready(function() {

      pageScroll();
      $("#contain").mouseover(function() {
        clearTimeout(my_time);
      }).mouseout(function() {
        pageScroll();
      });

      getWidthHeader('table_fixed', 'table_scroll');

    });

    var my_time;

    function pageScroll() {
      var objDiv = document.getElementById("contain");

      objDiv.scrollTop = objDiv.scrollTop + 1;
      if ((objDiv.scrollTop + 250) == objDiv.scrollHeight) {
        objDiv.scrollTop = 0;
      }
      my_time = setTimeout('pageScroll()', 60);
    }

    function getWidthHeader(id_header, id_scroll) {
      var colCount = 0;
      $('#' + id_scroll + ' tr:nth-child(1) td').each(function() {
        if ($(this).attr('colspan')) {
          colCount += +$(this).attr('colspan');
        } else {
          colCount++;
        }
      });

      for (var i = 1; i <= colCount; i++) {
        var th_width = $('#' + id_scroll + ' > tbody > tr:first-child > td:nth-child(' + i + ')').width();
        $('#' + id_header + ' > thead th:nth-child(' + i + ')').css('width', th_width + 'px');
      }
    }
  </script>

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
      <a href="../">
          <img src="../assets/image/LOGO WEB.png" style="height:5em; margin-top:-2px; float:left">
        </a> 
    </div>
      <div class="col">
        <p id='ct' class="date"></p>
        <p id='ct1' class="clock"></p>
      </div>
    </div>


  </div>
  <div class="row align-items-center" style="margin-top:20px;">
    <div class="col-sm-9">

      <div class="row row-cols-2">
        <div class="col status">
          <h3 class="judul">TERJADWAL</h3>
          <span class="count align-top"><?= $counterStudent ?></span>
          <span class="slash">/</span>
          <span class="count align-bottom">80</span>
        </div>
        <div class="col status">
          <h3 class="judul">BEBAS</h3>
          <span class="count align-top "><?= $counterFree ?></span>
          <span class="slash">/</span>
          <span class="count align-bottom " style="margin-bottom: 100px;">20</span>
        </div>

        <div class="col" style=" width:100%">

          <p>
          <h2 class="jadwal">JADWAL HARI INI</h2>
          </p>
          <div class="tableJadwal">
            <table id="table_fixed">
              <thead class="rounded1">
                <tr>
                  <th>Nim</th>
                  <th>Nama</th>
                  <th>Sesi &#10240;</th>
                  <th>Tanggal </th>
                  <th> Ruangan&#10240; </th>
                </tr>
              </thead>
            </table>

            <div id="contain">
              <table id="table_scroll">
                <tbody>
                  <tr>
                    <td> &#x200B;</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>
                  <?php
                  # menampilkan data mahasiswa
                  # yang sudah terjadwal
                  # @samuel andrey


                  $data = query("SELECT * FROM mahasiswa INNER JOIN jadwal
                                  ON jadwal.nim = mahasiswa.nim
                                  WHERE '$date_now' = tanggal &&
                                  $time_now >= jam_masuk &&
                                  $time_now <= jam_keluar-1");

                  foreach ($data as $row) : ?>
                    <tr>
                      <td><?= $row['nim'] ?></td>
                      <td><?= $row['nama'] ?></td>
                      <td><?= $row['jam_masuk'] . ".00 - " . $row['jam_keluar'] . ".00" ?></td>
                      <td><?= $row['tanggal'] ?></td>
                      <td><?= $row['ruangan'] ?> &#10240;</td>
                    </tr>
                  <?php endforeach; ?>

                  <tr>
                    <td> &#x200B;</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>

    <div class="col-sm-3">
      <div class="card text-bg-dark mb-3 my-auto " style="margin-right:2em">
        <div class="card-header" style="font-size: 1.5em; font-weight:500;">SCAN TO CHECK OUT</div>
        <div class="box mx-auto" style="--c:white;--w:3em;--b:0.1em; margin-top:15px">
          <canvas style="width:100%; padding:8px;" class="mx-auto"></canvas>
        </div>

        <div class="card-body">

          <p class="card-text">Sejajarkan kode QR di dalam kotak untuk memindai secara otomatis.</p>
        </div>
      </div>
    </div>
  </div>


  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <!-- Js Lib -->
  <script type="text/javascript" src="js/qrcodelib.js"></script>
  <script type="text/javascript" src="js/webcodecamjquery.js"></script>
  <script type="text/javascript">
    var arg = {
      resultFunction: function(result) {
        var redirect = '../validationcheckout.php';
        $.redirectPost(redirect, {
          input_qr: result.code
        });
      }
    };

    var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
    decoder.buildSelectMenu("select");
    decoder.play();

    $('select').on('change', function() {
      decoder.stop().play();
    });

    $.extend({
      redirectPost: function(location, args) {
        var form = '';
        $.each(args, function(key, value) {
          form += '<input type="hidden" name="' + key + '" value="' + value + '">';
        });
        $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body').submit();
      }
    });
  </script>

</body>

</html>