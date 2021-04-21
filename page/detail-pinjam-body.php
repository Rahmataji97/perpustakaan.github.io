<div class="holder">
    <span class="title">
        <span class="small">Transaction ID</span>
        <h3 class="h3"><?= $_GET['id']; ?></h3>
    </span>
    <div class="table-responsive holder-content">
        <table id="table" class="table table-hover table-bordered nowrap w-100">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>MEMBER ID</th>
                    <th>BOOK ID</th>
                    <th>TITLE</th>
                    <th>CATEGORY</th>
                    <th>ORDER DATE</th>
                    <th>RETURN DATE</th>
                    <th>TAX</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('../api/config.php');
                    $id    = $_GET['id'];
                    $query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota,
                    pinjam.tgl_pinjam, pinjam.status, kembali.tgl_kembali, kembali.denda, buku.*, kategori_buku.nama_kategori FROM transaksi
                    RIGHT JOIN buku ON buku.id_buku = transaksi.id_buku
                    RIGHT JOIN kategori_buku ON buku.id_kategori = kategori_buku.id_kategori
                    LEFT JOIN pinjam ON pinjam.id_transaksi = transaksi.id_transaksi
                    LEFT JOIN kembali ON kembali.id_transaksi = transaksi.id_transaksi
                    WHERE transaksi.id_transaksi='$id'") or die(mysqli_error($conn));
                    $no    = 0;
                    while($row = mysqli_fetch_array($query)) {
                        $no++;
                ?>
                <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td><?= $row['id_anggota']; ?></td>
                    <td><?= $row['id_buku']; ?></td>
                    <td><a href="./detail-buku.php?buku=<?= $row['id_buku']; ?>"><?= $row['judul']; ?></a></td>
                    <td class="text-center"><?= $row['nama_kategori']; ?></td>
                    <td class="text-center"><?= $row['tgl_pinjam']; ?></td>
                    <td class="text-center"><?= $row['tgl_kembali']; ?></td>
                    <td>Rp. <?= number_format($row['denda'],2,',','.'); ?></td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
    <span class="footer">
        <?php 
            $query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota,
            pinjam.tgl_pinjam, pinjam.status, kembali.tgl_kembali, kembali.denda, buku.* FROM transaksi
            RIGHT JOIN buku ON buku.id_buku = transaksi.id_buku
            LEFT JOIN pinjam ON pinjam.id_transaksi = transaksi.id_transaksi
            LEFT JOIN kembali ON kembali.id_transaksi = transaksi.id_transaksi
            WHERE transaksi.id_transaksi='$id'") or die(mysqli_error($conn));
            $row = mysqli_fetch_array($query);

            if($row['status'] == "") { 
        ?>
        <a class="btn btn-primary btn-sm m-1" href="../api/edit-transaksi.php?id=<?= $row['id_transaksi']; ?>&buku=<?= $row['id_buku']; ?>">
            <i class="check icon m-0"></i>CONFIRM ORDER
        </a>
        <?php } else { ?>
        <a class="btn btn-primary btn-sm m-1" href="../api/edit-item-order.php?id=<?= $row['id_transaksi']; ?>">
            <i class="check icon m-0"></i>CONFIRM RETURN
        </a>
        <?php } ?>
    </span>
</div>