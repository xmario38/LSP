<?php 

session_start();

if(!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

require 'functions.php';

$id = $_GET["id"];
$transaksi = query("SELECT * FROM transaksi WHERE id_transaksi = $id")[0];


?>

<?php include '../layout/sidebar.php' ?>

<div class="main">
    <h4>Data Transaksi</h4>


    <div class="detail-transaksi">
        <div class="foto">
            <img src="../foto/<?= $transaksi['foto_produk']; ?>" width="250px" alt="">
        </div>

        <div class="transaksi">
            <h4>Nama Pembeli : <?= $transaksi["name"]; ?></h4>
            <h4>Alamat : <?= $transaksi["alamat"]; ?></h4>
            <h4>Nomor Handphone : <?= $transaksi["no_hp"]; ?></h4>
            <h4>Nama Produk : <?= $transaksi["nama_produk"]; ?></h4>
            <h4>Harga Produk : <?= number_format($transaksi["harga_produk"]); ?></h4>
            <h4>Sub Total Harga : <?= number_format($transaksi["subtotal"]); ?></h4>
            <h4>Status : <?= $transaksi["status"]; ?></h4>
        </div>


        <?php
        
        if($transaksi["status"] == "proses"){
            ?>
            <div class="aksi">
                <a href="verif.php?id=<?= $transaksi["id_transaksi"]; ?>" class="verif">Verifikasi Transaksi</a>

                <a href="reject.php?id=<?= $transaksi["id_transaksi"]; ?>" class="reject">Reject</a>
            </div>
            <?php
        }elseif($transaksi["status"] == "dikirim"){
            ?>
                <button>Produk telah dikirim</button>
            <?php
        }elseif($transaksi["status"] == "ditolak"){
            ?>
                <button>Transaksi telah ditolak</button>
            <?php
        }

        ?>

       
    </div>


</div>