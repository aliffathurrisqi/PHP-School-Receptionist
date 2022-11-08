<?php
//koneksi database
$servername = "localhost";
$database   = "db_receptionist";
$username   = "root";
$password   = "";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
mysqli_query($conn, "SET time_zone = '+07:00'");
mysqli_query($conn, "SET lc_time_names = 'id_ID';");

//isi database
$comments = mysqli_query($conn, "SELECT * FROM data_komentar");
$visits = mysqli_query($conn, "SELECT * FROM data_kunjungan");
$subjects = mysqli_query($conn, "SELECT * FROM subject");
$purposes = mysqli_query($conn, "SELECT * FROM data_tujuan");
