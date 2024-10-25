<?php 
require_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $add_santri = add_santri();

    if ($add_santri == TRUE)
    {
       redirect('index.php');
        
        exit();
    }
    else
    {
        redirect('tambah_santri.php');

        exit();
    }
}

?>