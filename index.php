<?php include "header.php"; ?>
<body>
    <div class="container">
        <h3>List Data Santri</h3>
        <a href="tambah_santri.php">Tambah Santri</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
            <?php if (count(get_list_santri()) > 0 ): ?>
                <?php $no=1; foreach (get_list_santri() as $santri) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $santri['fullname']; ?></td>
                    <td><?php echo $santri['phone']; ?></td>
                    <td><?php echo $santri['address']; ?></td>
                    <td><?php echo get_gender($santri['gender']); ?></td>
                    <td>
                        <a href="edit_santri.php?santri_id=<?php echo $santri['santri_id']; ?>">Edit</a> |
                        <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="hapus_santri.php?santri_id=<?php echo $santri['santri_id']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php $no++; endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</body>
<?php include "footer.php"; ?>
