<?php

class Query
{

    public static function querySelect()
    {
    }

    public static function validateStudent($date_now, $time_now, $input_qr, $conn)
    {
        $query = "SELECT * FROM mahasiswa INNER JOIN jadwal
                    ON jadwal.nim = mahasiswa.nim
                    WHERE '$date_now' = tanggal
                    AND $time_now >= jam_masuk
                    AND $time_now <= jam_keluar - 1
                    AND '$input_qr' = mahasiswa.nim";

        return mysqli_query($conn, $query);
    }

    public static function insertLog($identity, $status, $jadwal, $conn)
    {
        $query = "INSERT INTO log_akses (kode, status, role, jadwal) VALUES ('$identity', '$status', 'mahasiswa', '$jadwal')";
        mysqli_query($conn, $query);
    }

    public static function counterStudentFree($date_now, $conn): int
    {
        $checkin = "SELECT * FROM log_akses WHERE tanggal = '$date_now' AND role = 'mahasiswa' AND status = 'check in' AND jadwal = 'tidak terjadwal'";
        $checkout = "SELECT * FROM log_akses WHERE tanggal = '$date_now' AND role = 'mahasiswa' AND status = 'check out' AND jadwal = 'tidak terjadwal'";

        $in = mysqli_num_rows(mysqli_query($conn, $checkin));
        $out = mysqli_num_rows(mysqli_query($conn, $checkout));

        return $in - $out;
    }

    public static function counterStudent($date_now, $conn): int
    {
        $checkin = "SELECT * FROM log_akses WHERE tanggal = '$date_now' AND role = 'mahasiswa' AND status = 'check in' AND jadwal = 'terjadwal'";
        $checkout = "SELECT * FROM log_akses WHERE tanggal = '$date_now' AND role = 'mahasiswa' AND status = 'check out' AND jadwal = 'terjadwal'";

        $in = mysqli_num_rows(mysqli_query($conn, $checkin));
        $out = mysqli_num_rows(mysqli_query($conn, $checkout));

        return $in - $out;
    }

    public static function checkRedundant($date_now, $input_qr, $status, $conn) {

        $checkin = "SELECT * FROM log_akses WHERE tanggal = '$date_now' AND role = 'mahasiswa' AND status = 'check in' AND kode = '$input_qr'";
        $checkout = "SELECT * FROM log_akses WHERE tanggal = '$date_now' AND role = 'mahasiswa' AND status = 'check out' AND kode = '$input_qr'";

        $in = mysqli_num_rows(mysqli_query($conn, $checkin));
        $out = mysqli_num_rows(mysqli_query($conn, $checkout));

        if ($status == 'check in') {
            if ($in == $out) return true;
            if ($in > 0) return false;
        }

        if ($status == 'check out') {
            if ($in != $out+1) return false;
        }

        return true;
    }
}
