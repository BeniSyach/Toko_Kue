<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'batiku');

  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $pesan = $_POST['pesan'];
  $query = mysqli_query($conn, " INSERT INTO komentar (username, email, message) VALUES ('$nama', '$email', '$pesan')");
  
  if($query){
    echo '
      <script>
        alert("Komentar sudah dikirim !");
        window.location = "../index.php"
      </script>
    ';
  }else{
    echo '
      <script>
        alert("Komentar tidak terkirim, coba ulangi !");
        window.location = "../index.php"
      </script>
    ';
  }
 ?>