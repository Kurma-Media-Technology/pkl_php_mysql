<?php 
require_once "config.php";

/**
 * Fungsi untuk konek ke database hafalan
 */
function connect_db()
{
    $db = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    return $db;
}

/**
 * Fungsi untuk mengambil data list santri
 */
function get_list_santri()
{
    $sql_ambil_data_santri = "SELECT * FROM santri";
    $db = connect_db();
    $eksekusi = $db->query($sql_ambil_data_santri);
    $result = array();

    while ($row = $eksekusi->fetch_assoc())
    {
        $result[] = $row;
    }

    return $result;
}

/**
 * Fungsi untuk mengambil gender
 */
function get_gender($data)
{
    if ($data == 1)
    {
        $result = 'Ikhwan';
    }
    else
    {
        $result = 'Akhwat';
    }

    return $result;
}

/**
 * Fungsi untuk mendebug data
 */
function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

/**
 * Fungsi untuk tambah santri
 */
function add_santri()
{
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $sql_tambah = "INSERT INTO santri (fullname, phone, address, gender) VALUES ('$fullname', '$phone', '$address', '$gender')";
    $eksekusi = connect_db()->query($sql_tambah);
    return $eksekusi;
}

/**
 * Fungsi untuk pindah url
 */
function redirect($file)
{
    header('Location: '.$file.'');
}

/**
 * Fungsi untuk mengambil data yang mau diedit
 */
function get_edit_santri()
{
    $santri_id = $_GET['santri_id'];
    $sql_ambil_edit = "SELECT * FROM santri WHERE santri_id='$santri_id'";
    $eksekusi = connect_db()->query($sql_ambil_edit);
    return $eksekusi->fetch_assoc();
}

/**
 * Fungsi untuk mengubah data santri
 */
function update_santri($san)
{
    $santri_id = $_POST['santri_id'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $sql_update_santri = "UPDATE santri SET fullname='$fullname', phone='$phone', address='$address', gender='$gender' WHERE santri_id='$santri_id'";
    $eksekusi = connect_db()->query($sql_update_santri);
    return $eksekusi;
}

/**
 * Fungsi untuk hapus data santri
 */
function delete_santri()
{
    $santri_id = $_GET['santri_id'];
    $sql_delete_santri = "DELETE FROM santri WHERE santri_id='$santri_id'";
    $eksekusi = connect_db()->query($sql_delete_santri);
    return $eksekusi;
}

/**
 * Fungsi untuk mengambil data list hafalan santri
 */
function get_list_hafalan_santri()
{
    $sql_ambil_data_santri = 
    "SELECT santri.fullname AS nama_santri, santri_hafalan.* 
    FROM santri_hafalan 
    LEFT OUTER JOIN santri ON santri_hafalan.santri_id=santri.santri_id
    WHERE santri_hafalan.tanggal BETWEEN '2024-10-20 00:00:00' AND '2024-10-20 23:59:59'";
    $db = connect_db();
    $eksekusi = $db->query($sql_ambil_data_santri);
    $result = array();

    while ($row = $eksekusi->fetch_assoc())
    {
        $result[] = $row;
    }

    return $result;
}