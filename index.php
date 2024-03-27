<?php 
  $nama = isset($_POST['nama']) ? $_POST['nama'] : "";
  $produk = isset($_POST['produk']) ? $_POST['produk'] : "";
  $jumlahproduk = isset($_POST['jumlahpesanan']) ? $_POST['jumlahpesanan'] : "";

  if(isset($_POST['submit'])){
  switch($produk){
    case "Smartphone" :
      $hargsatuan=1500000; break;
    case "Kulkas" :
      $hargsatuan=3200000; break;
    case "Komputer" :
      $hargsatuan=6000000; break;
    case "Laptop" :
      $hargsatuan=4000000; break;
    case "Television" :
      $hargsatuan=1500000; break;
    case "AC" :
      $hargsatuan=3000000;
  }

  $totalharga= $jumlahproduk * $hargsatuan ;

  $diskon = ($totalharga >= 5000000) ? (0.20 * $totalharga) : 0;

  $ppn= 0.10 *($totalharga - $diskon);

  $hargabersih= ($totalharga - $diskon) + $ppn;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<h1 class="col-6" align="center" style="color: white; background-color: lightsteelblue; margin-left: 26%;">Form Belanja</h1>
<form action="index.php" method="POST">
  <div class="form-group row">
    <label align="left" for="nama" class="col-2 col-form-label">Nama</label> 
    <div class="col-4">
      <input id="nama" name="nama" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label align="left" for="produk" class="col-2 col-form-label">Produk</label> 
    <div class="col-4">
      <select id="produk" name="produk" class="custom-select">
        <option value="">-------------Pilih Produk-------------</option>
        <option value="Smartphone">Smartphone</option>
        <option value="Kulkas">Kulkas</option>
        <option value="Komputer">Komputer</option>
        <option value="Laptop">Laptop</option>
        <option value="Television">Television</option>
        <option value="AC">AC</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label align="left" for="jumlahpesanan" class="col-2 col-form-label">Jumlah Pesanan</label> 
    <div class="col-4">
      <input id="jumlahpesanan" name="jumlahpesanan" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-1 col-5">
      <button style="margin-left: 50%;" name="submit" type="submit" class="btn btn-primary">Submit</button>
      <button name="unproses" type="reset" class="btn btn-success">Batal</button>
    </div>
  </div>
</form>

<?php if(isset($_POST['submit'])): ?>
  <div class="container" style="color: white;">
    <h2>Detail Pembelian</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Produk</th>
          <th>Jumlah Pesanan</th>
          <th>Harga Satuan</th>
          <th>Total Harga</th>
          <th>Diskon</th>
          <th>PPN</th>
          <th>Harga Bersih</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $nama ?></td>
          <td><?= $produk ?></td>
          <td><?= $jumlahproduk ?></td>
          <td><?= isset($hargsatuan) ? $hargsatuan : "" ?></td>
          <td><?= isset($totalharga) ? $totalharga : "" ?></td>
          <td><?= isset($diskon) ? $diskon : "" ?></td>
          <td><?= isset($ppn) ? $ppn : "" ?></td>
          <td><?= isset($hargabersih) ? $hargabersih : "" ?></td>
        </tr>
      </tbody>
    </table>
  </div>
<?php endif; ?>

</body>
</html>

