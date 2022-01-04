<?php
session_start();
session_destroy();
echo "<script>alert('You Have Been LogOut');</script>";
echo "<script>location='login.php';</script>";
?>