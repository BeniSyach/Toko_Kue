  
<?php
   if(isset($_POST['pencarian'])){
            //menangkap nilai form
            $tanggal_awal=$_POST['tanggal_awal'];
            $tanggal_akhir=$_POST['tanggal_akhir'];
            if(empty($tanggal_awal) || empty($tanggal_akhir)){
            //jika data tanggal kosong
            ?>
            <script language="JavaScript">
                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='index.php';
            </script>
            <?php
            }else{
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
            <?php
            $query=mysql_query("select * from tb_karyawan where tgl_masuk between '$tanggal_awal' and '$tanggal_akhir'");
            }
        ?>
        </p>
        <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#FF6600">
                <th width="10" height="40">ID</td> 
                <th width="60">NIP</td> 
                <th width="70">Nama</td> 
                <th width="60">Jenis Kelamin</td> 
                <th width="170">Tanggal Masuk</td> 
                <th width="70">Status</td>       
            </tr>
            <?php
            //menampilkan pencarian data
            while($row=mysql_fetch_array($query)){
            ?>
            <tr>
                <td align="center" height="30"><?php echo $row['id_karyawan']; ?></td>
                <td align="center"><?php echo $row['nip']; ?></td>
                <td align="center"><?php echo $row['nama'];?></td>
                <td align="center"><?php echo $row['jk'];?></td>
                <td align="center"><?php echo $row['tgl_masuk'];?></td>
                <td align="center"><?php echo $row['status'];?></td>
            </tr>
            <?php
            }
            ?>    
            <tr>
                <td colspan="4" align="center"> 
                <?php
                //jika pencarian data tidak ditemukan
                if(mysql_num_rows($query)==0){
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                }
                ?>
                </td>
            </tr> 
        </table>
        <?php
        }
        else{
            unset($_POST['pencarian']);
        }
        ?>
        <iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

       <a href="print1.php" class="btn-warning btn">Cetak Laporan</a>
    </body>
</html>