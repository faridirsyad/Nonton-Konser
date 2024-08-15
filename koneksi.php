<?php
//session
session_start();

//koneksi database
$host = "localhost";
$username = "root";
$password = "";
$database = "konser";
//membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

?>


