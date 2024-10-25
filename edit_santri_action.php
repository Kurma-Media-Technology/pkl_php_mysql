<?php 
require_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $update_santri = update_santri();

    if ($update_santri == TRUE)
    {
       redirect('index.php');
        
        exit();
    }
    else
    {
        $santri_id = $_POST['santri_id'];
        redirect('edit_santri.php?santri_id='.$santri_id.'');

        exit();
    }
}

?>