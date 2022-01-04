<?php
session_start();
unset($_SESSION["pelanggan"]);
unset($_SESSION["keranjang"]);

echo "<script>alert('You have been Logout');</script>";
echo "<script>location='index.php';</script>";
?>