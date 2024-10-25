<?php include "header.php"; ?>
<!-- <?php debug(get_list_hafalan_santri()); ?> -->
<body>
    <div class="container">
        <h3>List Data Hafalan Santri</h3>
        <!-- <a href="tambah_santri.php">Tambah Santri</a> -->
        <table>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Santri</th>
                <th>Surah</th>
                <th>Dari ayat</th>
                <th>Sampai ayat</th>
                <th>Aksi</th>
            </tr>
            <?php if (count(get_list_hafalan_santri()) > 0 ): ?>
                <?php $no=1; foreach (get_list_hafalan_santri() as $hafalan) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo date('d-m-Y H:i:s', strtotime($hafalan['tanggal'])); ?></td>
                    <td><?php echo $hafalan['nama_santri']; ?></td>
                    <td><?php echo $hafalan['surah']; ?></td>
                    <td><?php echo $hafalan['from_ayat']; ?></td>
                    <td><?php echo $hafalan['to_ayat']; ?></td>
                    <td>
                        <a href="edit_santri.php?id=<?php echo $hafalan['id']; ?>">Edit</a> |
                        <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="hapus_santri.php?id=<?php echo $hafalan['id']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php $no++; endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</body>
<?php include "footer.php"; ?>
