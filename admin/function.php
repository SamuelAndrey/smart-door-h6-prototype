<?php

function tambah_jadwal($data)
{
    global $conn;
    $id_mhs = htmlspecialchars($data["id_mhs"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $jam_masuk = htmlspecialchars($data["jam_masuk"]);
    $jam_keluar = htmlspecialchars($data["jam_keluar"]);
    $ruangan = htmlspecialchars($data["ruangan"]);

    $query = "INSERT INTO jadwal (id_mhs, tanggal, jam_masuk, jam_keluar, ruangan)
              VALUES ($id_mhs, '$tanggal', $jam_masuk, $jam_keluar, '$ruangan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
