<?php

$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'mp07uf1';

try {
    $conn = mysqli_connect($host, $user, $pass, $db);
} catch (Exception $e) {
    echo "Error al conectarse.";
}
