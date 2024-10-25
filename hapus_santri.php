<?php 
require_once "functions.php";
$delete_santri = delete_santri();
if ($delete_santri == TRUE)
{
    redirect('index.php');
    
    exit();
}
else
{
    $pesan = 'Data gagal dihapus!';
    redirect('index.php?pesan='.$pesan.'');

    exit();
}
?>