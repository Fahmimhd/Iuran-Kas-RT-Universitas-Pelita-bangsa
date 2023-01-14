<?php 
    include "koneksi.php"; 
//memasukan data  
    $tsimpan = "INSERT INTO tiuran(nama,
                                   alamat,
                                   nominal,
                                   keterangan)
            VALUES ('$_POST[tnama]',
                    '$_POST[talamat]',
                    '$_POST[tnominal]',
                    '$_POST[tketerangan]')";
    $query = mysqli_query($koneksi,$tsimpan);
if ($tsimpan) {
  echo "<script>
  alert('simpan data sukses');
  document.location='index.php';
  </script>";

}else {
  echo "<script>
  alert('simpan data gagal');
  document.location='index.php';
  </script>";

}

    
?>