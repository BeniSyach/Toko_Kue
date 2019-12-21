<?php 
session_start();
session_destroy();
echo "<script>alert('anda telah logut');</script>";
echo "<script>location='index.php';</script>";
 ?>