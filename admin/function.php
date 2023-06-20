<?php

function tambah_jadwal($data)
{
    global $conn;
    $nim = htmlspecialchars($data["nim"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $jam_masuk = htmlspecialchars($data["jam_masuk"]);
    $jam_keluar = htmlspecialchars($data["jam_keluar"]);
    $ruangan = htmlspecialchars($data["ruangan"]);

    $query = "INSERT INTO jadwal (nim, tanggal, jam_masuk, jam_keluar, ruangan)
              VALUES ('$nim', '$tanggal', $jam_masuk, $jam_keluar, '$ruangan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function tambah_staf($data)
{
    
    global $conn;
    $npp = htmlspecialchars($data["npp"]);
    $nidn = htmlspecialchars($data["nidn"]);
    $nama = htmlspecialchars($data["nama"]);
    $jabatan = htmlspecialchars($data["jabatan_fungsional"]);


    $query = "INSERT INTO staf (npp, nidn, nama, jabatan_fungsional )
              VALUES ('$npp', '$nidn', '$nama', '$jabatan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function limitTambahJadwal() {
    global $conn;
    $time_now = date('H');
    $date_now = date("Y-m-d");
    $statement = "SELECT * FROM jadwal
                    WHERE '$date_now' = tanggal &&
                    $time_now-6 >= jam_masuk &&
                    $time_now <= jam_keluar-1";

    return mysqli_num_rows(mysqli_query($conn, $statement));
}
