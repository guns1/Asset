<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id_asset   = $_POST['id_asset'];
  $nama     = $_POST['nama'];
  $jenis_asset    = $_POST['jenis_asset'];
  $jumlah_asset    = $_POST['jumlah_asset'];
  $gambar_asset = $_FILES['gambar_asset']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gambar_asset != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_asset); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_asset']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_asset; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO produk (id_asset, nama, jenis_asset, jumlah_asset, gambar_asset) VALUES ('$id_asset', '$nama', '$jenis_asset', '$jumlah_asset', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO produk (id_asset, nama, jenis_asset, jumlah_asset, gambar_asset) VALUES ('$id_asset', '$nama', '$jenis_asset', '$jumlah_asset', null)";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}