<?php include 'layout/navbar.php'; ?>
<?php 

$data = query("SELECT * FROM transaksi WHERE name ='{$_SESSION['name']}'");

?>



<div class="container">

    <div class="informasi">
        <h2>Halo PRISEL, WELCOME! <?= $_SESSION["name"]; ?> ini Dashboard belanja MU!</h2><br /> <br />

        <p>Status = Proses <br /> Mohon Bersabar PRISEL, Produk Mu Sedang Di Proses Oleh Admin</p>

        <p>Status = Di Kirim <br /> Mohon Tunggu , Produk Mu Sedang Di Antar!</p>

        <p>Status = Di Tolak <br /> Mohon Di Periksa Kembali Data-Data Mu Dan Pastikan Mengisi Data Yang Benar!</p>   
    </div>

    <div class="data-transaksi">
    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nama Produk</th>
            <th>Alamat</th>
            <th>Harga Produk</th>
            <th>Foto Produk</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($data as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["name"]; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><?= $data["alamat"]; ?></td>
                <td>Rp <?= $data["harga_produk"]; ?></td>
                <td><img src="foto/<?= $data["foto_produk"]; ?>" width="80"></td>
                <td><?= $data["status"]; ?></td>
                <td>
                    <a href="detail_transaksi.php?id=<?= $data["id_transaksi"]; ?>" class="detail">Detail Transaksi</a>
                </td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </div>


</div>