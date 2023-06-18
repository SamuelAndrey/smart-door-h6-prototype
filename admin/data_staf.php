<?php require_once __DIR__ . "/header.php"; ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Staf</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Staf</li>
      </ol>
      <div class="card mb-4">
        <div class="card-body">
          Untuk menambahkan data jadwal.
          <a href="#" data-bs-toggle="modal" data-bs-target="#inputStaf"> Klik disini</a>
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Data staf
        </div>
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>NPP</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>NPP</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>

              <?php
              # menampilkan data mahasiswa 
              $data = query("SELECT * FROM staf");
              foreach ($data as $row) : ?>
                <tr>
                  <td><?= $row['npp'] ?></td>
                  <td><?= $row['nidn'] ?></td>
                  <td><?= $row['nama'] ?></td>
                  <td>
                    <a href="">Hapus</a>
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
<div class="modal fade" id="inputStaf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Staf</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" class="row g-3">
        <div class="modal-body">
          <div class="col-md-12">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="col-md-12">
            <label for="npp" class="form-label">NPP</label>
            <input type="text" class="form-control" id="npp" name="npp">
          </div>
          <div class="col-md-12">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" class="form-control" id="nidn" name="nidn">
          </div>

          <div class="col-md-12">
            <label for="jabatan_fungsional" class="form-label">Jabatan Fungsional</label>
            <input type="text" class="form-control" id="jabatan_fungsional" name="jabatan_fungsional">
          </div>
          <!-- Masih milik form -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah_staf">Save changes</button>  
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>