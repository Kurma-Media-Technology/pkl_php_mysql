<?php 
require_once "config.php";

// 1.connect
$db = new mysqli(HOSTNAME, USERNAME, PASSWORD);

// cek konek
if ($db->connect_error)
{
    die("Gagal konek: " . $db->connect_error);
}

/*

// 2.buat database
$sql_buat_db = "CREATE DATABASE hafalan";
$eksekusi_buat_db = $db->query($sql_buat_db);

if ($eksekusi_buat_db)
{
    echo 'Buat db hafalan berhasil' . '<br>';
}

*/

// 3.masuk ke database
$sql_masuk_db = "USE hafalan";
$eksekusi_masuk_db = $db->query($sql_masuk_db);

if ($eksekusi_masuk_db)
{
    echo 'Sudah masuk ke database hafalan' . '<br>';
}

/*
// 4.buat tabel santri
$sql_buat_tabel_santri = "CREATE TABLE santri (
    santri_id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255),
    phone VARCHAR(50),
    address TEXT,
    gender BOOLEAN
)";
$eksekusi_buat_tabel_santri = $db->query($sql_buat_tabel_santri);

if ($eksekusi_buat_tabel_santri)
{
    echo "Tabel santri berhasil dibuat" . '<br>';
}

// 5.buat tabel santri hafalan
$sql_buat_tabel_santri_hafalan = "CREATE TABLE santri_hafalan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tanggal DATETIME,
    santri_id INT,
    surah VARCHAR(255),
    from_ayat VARCHAR(255),
    to_ayat VARCHAR(255),
    FOREIGN KEY (santri_id) REFERENCES santri(santri_id)
)";
$eksekusi_buat_tabel_santri_hafalan = $db->query($sql_buat_tabel_santri_hafalan);

if ($eksekusi_buat_tabel_santri_hafalan)
{
    echo "Tabel santri hafalan berhasil dibuat" . '<br>';
}

// 6.tambah data ke tabel santri
$sql_tambah_data = "INSERT INTO santri (fullname, phone, address, gender) VALUES ('Firman', '08999999', 'cawang baru', 1)";
$eksekusi_tambah_data = $db->query($sql_tambah_data);
*/
// $sql_tambah_data = "INSERT INTO santri (fullname, phone, address, gender) VALUES ('Kevin', '08111111', 'poltangan', 1)";
// $eksekusi_tambah_data = $db->query($sql_tambah_data);

// tutup koneksi db
// $db->close();

$sql_tambah_data = "INSERT INTO santri_hafalan (tanggal, santri_id, surah, from_ayat, to_ayat) VALUES ('2024-10-18 11:06:00', '1', 'al-fatihan', 1, 2)";
$eksekusi_tambah_data = $db->query($sql_tambah_data);

$sql_tambah_data = "INSERT INTO santri_hafalan (tanggal, santri_id, surah, from_ayat, to_ayat) VALUES ('2024-10-19 12:06:00', '1', 'al-fatihan', 2, 5)";
$eksekusi_tambah_data = $db->query($sql_tambah_data);

$sql_tambah_data = "INSERT INTO santri_hafalan (tanggal, santri_id, surah, from_ayat, to_ayat) VALUES ('2024-10-19 15:06:00', '1', 'al-fatihan', 5, 7)";
$eksekusi_tambah_data = $db->query($sql_tambah_data);

$sql_tambah_data = "INSERT INTO santri_hafalan (tanggal, santri_id, surah, from_ayat, to_ayat) VALUES ('2024-10-19 15:06:00', '2', 'al-ikhlas', 1, 2)";
$eksekusi_tambah_data = $db->query($sql_tambah_data);

$sql_tambah_data = "INSERT INTO santri_hafalan (tanggal, santri_id, surah, from_ayat, to_ayat) VALUES ('2024-10-20 16:06:00', '2', 'al-ikhlas', 2, 3)";
$eksekusi_tambah_data = $db->query($sql_tambah_data);


?>