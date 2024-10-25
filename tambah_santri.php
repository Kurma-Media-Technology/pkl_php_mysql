<?php include "header.php"; ?>
<body>
    <div class="container">
        <h3>Tambah Santri</h3>
        <form action="tambah_santri_action.php" method="POST">
            <label for="fullname">Nama Lengkap</label>
            <br>
            <input type="text" name="fullname" id="fullname" placeholder="Nama Lengkap" required autofocus>
            <br>
            <label for="phone">No HP</label>
            <br>
            <input type="text" name="phone" id="phone" placeholder="No HP" required>
            <br>
            <label for="address">Alamat</label>
            <br>
            <textarea name="address" id="address"></textarea>
            <br>
            <label for="gender">Jenis Kelamin</label>
            <br>
            <select name="gender" id="gender">
                <option value="1">Ikhwan</option>
                <option value="0">Akhwat</option>
            </select>
            <br>
            <br>
            <button type="submit">Tambah Santri</button>
        </form>
    </div>
</body>
<?php include "footer.php"; ?>
