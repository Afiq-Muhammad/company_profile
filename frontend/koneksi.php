<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$konek = mysqli_connect('localhost', 'root', '', 'cmpro');
if (!$konek) {
    die("Connection failed: " . mysqli_connect_error());
}
