<?php

class Query
{

    public static function querySelect()
    {
    }

    public static function validateStudent($date_now, $time_now, $input_qr, $conn)
    {
        $query = "SELECT * FROM mahasiswa INNER JOIN jadwal
                    ON jadwal.id_mhs = mahasiswa.id_mhs
                    WHERE '$date_now' = tanggal
                    AND $time_now >= jam_masuk
                    AND $time_now <= jam_keluar - 1
                    AND '$input_qr' = nim";

        return mysqli_query($conn, $query);
    }

    public static function insertLog($identity, $status, $role, $conn)
    {
        $query = "INSERT INTO log_akses (kode, status, role) VALUES ('$identity', '$status', '$role')";
        mysqli_query($conn, $query);
    }

    public static function counterStaf($date_now, $conn): int
    {
        $checkin = "SELECT * FROM log_akses WHERE tanggal = '$date_now' AND role = 'staf' AND status = 'check in'";
        $checkout = "SELECT * FROM log_akses WHERE tanggal = '$date_now' AND role = 'staf' AND status = 'check out'";

        $in = mysqli_num_rows(mysqli_query($conn, $checkin));
        $out = mysqli_num_rows(mysqli_query($conn, $checkout));

        return $in - $out;
    }

    public static function counterStudent($date_now, $conn): int
    {
        $checkin = "SELECT * FROM log_akses WHERE tanggal = '$date_now' AND role = 'mahasiswa' AND status = 'check in'";
        $checkout = "SELECT * FROM log_akses WHERE tanggal = '$date_now' AND role = 'mahasiswa' AND status = 'checck out'";

        $in = mysqli_num_rows(mysqli_query($conn, $checkin));
        $out = mysqli_num_rows(mysqli_query($conn, $checkout));

        return $in - $out;
    }
}
