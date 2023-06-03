<?php require_once __DIR__ . "/header.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tables</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                    <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                    .
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Mahasiswa
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Angkatan</th>
                                <th>Fakultas</th>
                                <th>Progdi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Angkatan</th>
                                <th>Fakultas</th>
                                <th>Progdi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                            # menampilkan data mahasiswa 
                            $data = query("SELECT * FROM mahasiswa");
                            foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['id_mhs'] ?></td>
                                    <td><?= $row['nim'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['angkatan'] ?></td>
                                    <td><?= $row['fakultas'] ?></td>
                                    <td><?= $row['progdi'] ?></td>
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
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>