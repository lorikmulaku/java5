<?php
// Lidhja me databazen (XAMPP: user root, pa fjalekalim)
$conn = new mysqli("localhost", "root", "", "ushtrimi5");

if ($conn->connect_error) {
    die("Lidhja me databazen deshtoi: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");