<?php require_once __DIR__ . "/header.php"; ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Jadwal</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Jadwal</li>
      </ol>
      <div class="card mb-4">
        <div class="card-body">
          Untuk menambahkan data jadwal.
          <a href="#" data-bs-toggle="modal" data-bs-target="#inputJadwal"> Klik disini</a>
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Data Jadwal
        </div>
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Ruangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Ruangan</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>

              <?php
              # menampilkan data jadwal 
              $data = query("SELECT * FROM jadwal");
              foreach ($data as $row) : ?>
                <tr>
                  <td><?= $row['id_jadwal'] ?></td>
                  <td><?= $row['nim'] ?></td>
                  <td><?= $row['tanggal'] ?></td>
                  <td><?= $row['jam_masuk'] . ".00" ?></td>
                  <td><?= $row['jam_keluar'] . ".00" ?></td>
                  <td><?= $row['ruangan'] ?></td>
                  <td>
                    <a href="">Edit</a> | <a href="">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

</div>
</div>


<!-- Modal input data -->
<div class="modal fade" id="inputJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="" method="post" class="row g-3">
          <div class="col-md-6">
            <label for="inputId" class="form-label">NIM</label>
            <select id="inputID" class="form-select" name="nim">
              <?php
                $data = query("SELECT nim FROM mahasiswa");
                foreach ($data as $row) : ?>
                <option><?= $row['nim'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputDate" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="inputDate" name="tanggal">
          </div>

          <div class="col-md-6">
            <label for="inputState" class="form-label">Jam masuk</label>
            <select id="inputState" class="form-select" name="jam_masuk">
              <?php for ($i = 0; $i <= 24; $i++) : ?>
                <option><?= $i ?></option>
              <?php endfor ?>
            </select>
          </div>

          <div class="col-md-6">
            <label for="inputState" class="form-label">Jam keluar</label>
            <select id="inputState" class="form-select" name="jam_keluar">
              <?php for ($i = 0; $i <= 24; $i++) : ?>
                <option><?= $i ?></option>
              <?php endfor ?>
            </select>
          </div>
          <div class="col-md-12">
            <label for="inputRuangan" class="form-label">Ruangan</label>
            <input type="text" class="form-control" id="inputRuangan" name="ruangan">
          </div>
          <!-- Masih milik form -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="tambah_jadwal">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>