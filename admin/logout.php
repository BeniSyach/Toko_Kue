<h2>Logout</h2>
<?php 
session_destroy();
echo "<script>alert('anda telah logut');</script>";
echo "<script>location='login.php';</script>";
 ?>