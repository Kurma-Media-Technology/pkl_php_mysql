<?php 
include "header.php"; 
$get_edit = get_edit_santri();
?>
<body>
    <div class="container">
        <h3>Edit Santri</h3>
        <form action="edit_santri_action.php" method="POST">
            <input type="hidden" name="santri_id" value="<?php echo $get_edit['santri_id']; ?>">
            <label for="fullname">Nama Lengkap</label>
            <br>
            <input type="text" name="fullname" id="fullname" placeholder="Nama Lengkap" value="<?php echo $get_edit['fullname']; ?>" required>
            <br>
            <label for="phone">No HP</label>
            <br>
            <input type="text" name="phone" id="phone" placeholder="No HP" value="<?php echo $get_edit['phone']; ?>" required>
            <br>
            <label for="address">Alamat</label>
            <br>
            <textarea name="address" id="address"><?php echo $get_edit['address']; ?></textarea>
            <br>
            <label for="gender">Jenis Kelamin</label>
            <br>
            <select name="gender" id="gender">
                <option value="1" <?php echo $get_edit['gender'] == '1' ? 'selected' : ''; ?> >Ikhwan</option>
                <option value="0" <?php echo $get_edit['gender'] == '0' ? 'selected' : ''; ?>  >Akhwat</option>
            </select>
            <br>
            <br>
            <button type="submit">Update Santri</button>
            <br>
            <a href="index.php">Kembali</a>
        </form>
    </div>
</body>
<?php include "footer.php"; ?>
