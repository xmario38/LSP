<?php include 'layout/navbar.php'; ?>

<?php 

if (empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo "<script>alert('Keranjang kosong, silahkan berbelanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

$totalBelanja = 0; ?>
<?php foreach ($_SESSION['cart'] as $produk => $result) : ?>

<?php $data = query("SELECT * FROM produk WHERE id_produk = '$produk'")[0];
    $totalHarga =  $result * $data["harga_produk"];
    ?>

<?php endforeach;


?>


<div class="container">
        <div class="card-checkout" style="margin-top: 50px">
            <form action="" method="POST">
                <h4><label>Nama Penerima</label></h4>
                <input type="text" name="name" class="form-control" value="<?= $_SESSION['name']; ?>"><br /><br />

                <h4><label>Alamat</label></h4>
                <input type="text" name="alamat" class="form-control" id="alamat"><br /><br />

                <h4><label>No Handphone</label></h4>
                <input type="text" name="no_hp" class="form-control" id="no_telp"><br /><br />

                <h4><label>Nama Produk</label></h4>
                <input type="text" name="nama_produk" value=" <?= $data["nama_produk"]; ?>" class="form-control"><br /><br />

                <h4><label>Harga Satuan</label><h4>
                <input type="text" name="harga_produk" class="form-control" value="<?= number_format($data['harga_produk']); ?>"><br /><br />

                <h4><label>Sub Total Harga</label><h4>
                <input type="text" name="subtotal" class="form-control"
                    value="<?= $totalHarga =  $result * $data["harga_produk"]; ?>"><br /><br />

                <input type="hidden" name="foto_produk" 
                value="<?= $data['foto_produk']; ?>"><br /><br />

                <button type="submit" name="checkout" class="btn-checkout">Kirim</button><br /><br />
            </form>
        </div>
    </div>



    <?php
    if (isset($_POST['checkout'])) {
        if (checkoutProduct($_POST) > 0) {
            echo "
                <script>
                    alert('Pembelian sukses!');
                    location='index.php';
                </script>
            ";
        } else {
            
            echo mysqli_error($conn);
        }
    }

    ?>

