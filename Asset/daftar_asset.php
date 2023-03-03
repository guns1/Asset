<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Daftar Asset dengan Gambar</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
  <body>
    <center><h1>Data Asset</h1><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>ID Asset</th>
          <th>Nama</th>
          <th>Jenis Asset</th>
          <th>Jumlah Asset</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>

      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM tambah_asset ORDER BY id_asset ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_error($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
     //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          
          <td><?php echo $row['id_asset']; ?></td>
          <td><?php echo substr($row['nama'], 0, 20); ?>...</td>
          <td><?php echo number_format($row['jenis_asset'],0,',','.'); ?></td>
          <td><?php echo $row['jumlah_asset']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_asset']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>