<?php
session_start();
session_unset();
session_destroy();
// echo "Logged Out";
echo "<script> window.location.href='index.php';</script>";
?>