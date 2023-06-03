<?php
# code @samuel andrey
# smart door lock h.6
# smart door h6 v.1
# file connection to database

$conn = mysqli_connect("localhost", "root", "", "smart_door_h6");

if (!$conn) echo "Connection fail";
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
