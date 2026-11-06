<?php
$con = mysqli_connect("db", "mausdlt", "123456", "libreria");

if (mysqli_connect_errno()) {
    echo "Error al conectar: " . mysqli_connect_error();
    exit;
}
