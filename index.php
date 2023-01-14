<?php 

//panggil koneksi Database
include "koneksi.php";

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  </head>
    
  <body style=background-color:lightgray>

    <div  class="container">

    <div class="mt-3">
        <h3 class="text-center">Aplikasi Iuran Kas RT</h3>
        <h3 class="text-center">Teknik Informatika</h3>
    </div> 

        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                 Data Iuran Warga
            </div>
           <div class="card-body">
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#ModalTambah">
  Tambah Iuran
</button>
<!-- kolom tabel awal-->
<table class="table table-bordered table-striped table-hover">
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Nominal</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>

                <?php

//persiapan memnampilkan data
                $no = 1;
                $tampil = mysqli_query($koneksi,"SELECT * FROM tiuran ORDER BY id_iuran DESC");
                while($data = mysqli_fetch_array($tampil)) :
                

                ?>

                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $data['nama']?></td>
                    <td class="text-center"><?= $data['alamat']?></td>
                    <td class="text-center"><?= $data['nominal']?></td>
                    <td class="text-center"><?= $data['keterangan']?></td>
                    <td class="text-center">
                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalUbah<?= $no ?>">Ubah</a>
                    <a href="#" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                    </td>   
                </tr>

<!-- Modal awal Ubah-->
<div class="modal fade" id="ModalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> 
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Warga</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="ubah_data.php">
        <input type="hidden" name="id_iuran" value="<?= $data['id_iuran']?>" >
      <div class="modal-body">

  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
  <input type="text" class="form-control" name="tnama" value="<?= $data['nama']?>" placeholder="Masukan Nama Anda">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Alamat</label>
  <input type="text" class="form-control" name="talamat" value="<?= $data['alamat']?>" placeholder="Masukan Nama Anda">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nominal</label>
  <input type="text" class="form-control" name="tnominal" value="<?= $data['nominal']?>" placeholder="Masukan Nominal Iuran">
  
  
</div>

<div class="mb-3">
  <label class="form-label">Keterangan</label>
  <select class="form-select" name="tketerangan">
    <option><?= $data['keterangan']?></option>
    <option value="LUNAS">LUNAS</option>
    <option value="BELUM LUNAS">BELUM LUNAS</option>
  </select>
</div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
    
      </div>
      </form>

    </div>
  </div>
</div>
<!-- Modal akhir Ubah-->

<?php endwhile; ?>
</table>
<!--kolom tabel akhir-->


<!-- Modal awal tambah data-->
<div class="modal fade modal-lg" id="ModalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Data Iuran</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud.php">
      <div class="modal-body">
        
        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
  <input type="text" class="form-control" name="tnama" placeholder="Masukan Nama Anda">
</div>

<div class="mb-3">
  <label class="form-label">Alamat</label>
  <textarea class="form-control" name="talamat" rows="3"></textarea>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nominal</label>
  <input type="text" class="form-control" name="tnominal" placeholder="Masukan Nominal Iuran">
  
  
</div>

<div class="mb-3">
  <label class="form-label">Keterangan</label>
  <select class="form-select" name="tketerangan">
    <option></option>
    <option value="LUNAS">LUNAS</option>
    <option value="BELUM LUNAS">BELUM LUNAS</option>
  </select>
</div>

<div class="modal-footer">
  <button type="submit" class="btn btn-primary" name="tsimpan">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
    
      </div>
      </form>

    </div>
  </div>
</div>
<!-- Modal akhir tambah data -->
           </div>
        </div>

    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      </div>
  </body>

</html>