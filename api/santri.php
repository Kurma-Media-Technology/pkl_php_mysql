<?php 
// Turn off all error reporting
// error_reporting(0);

require_once "helper.php";
require_once "../functions.php";

$request_method = $_SERVER['REQUEST_METHOD'];

switch ($request_method) 
{
    case 'GET':

        if (isset($_GET['santri_id']) && !empty($_GET['santri_id']))
        {
            $get_santri_id = $_GET['santri_id'];

            $get_edit_santri = get_edit_santri();

            if ($get_edit_santri == NULL)
            {
                $respon = array(
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                    'data' => array()
                );

                echo response($respon, 404);
                die;
            }
            else
            {
                $respon = array(
                    'status' => true,
                    'message' => 'Sukses',
                    'data' => $get_edit_santri
                );
            }
        }
        else
        {
            $respon = array(
                'status' => true,
                'message' => 'Sukses',
                'data' => get_list_santri()
            );
        }

        echo response($respon, 200);

        break;
    
    case 'POST':

        // validasi tambah
        if ($_POST['fullname'] == '' OR $_POST['phone'] == '' OR $_POST['address'] == '' OR  $_POST['gender'] == '')
        {
            $respon =  array(
                'status' => false,
                'message' => 'Fullname, phone, address dan gender tidak boleh kosong',
                'data' => array()
            );

            echo response($respon, 400);
            
        }
        else
        {
            $add_santri = add_santri();

            if ($add_santri)
            {
                $respon =  array(
                    'status' => true,
                    'message' => 'Berhasil nambah',
                    'data' => array()
                );

                echo response($respon, 200);
            }
            else
            {

                $respon =  array(
                    'status' => false,
                    'message' => 'Gagal nambah',
                    'data' => array()
                );

                echo response($respon, 400);
            }
        }

        break;
    
    case 'DELETE':

        // validasi hapus
        $cek_santri = get_edit_santri();
        
        if ($cek_santri == FALSE)
        {
            $respon =  array(
                'status' => false,
                'message' => 'Santri tidak ditemukan',
                'data' => array()
            );
    
            echo response($respon, 404);
        }
        else
        {
            $delete_santri = delete_santri();

            if ($delete_santri)
            {
                $respon =  array(
                    'status' => true,
                    'message' => 'Behasil menghapus',
                    'data' => array()
                );
        
                echo response($respon, 200);
            }
            else
            {
                $respon =  array(
                    'status' => false,
                    'message' => 'Gagal menghapus',
                    'data' => array()
                );
        
                echo response($respon, 500);
            }
        }

        break;
    
    case 'PUT':

        $get_body = file_get_contents("php://input"); // jadi data JSON
        $get_json = json_decode($get_body, TRUE); // jadi array data

        $_POST['santri_id'] = $get_json['santri_id'];
        $_POST['fullname'] = $get_json['fullname'];
        $_POST['phone'] = $get_json['phone'];
        $_POST['address'] = $get_json['address'];
        $_POST['gender'] = $get_json['gender'];

        // validasi edit
        if ($_POST['santri_id'] == ''  OR $_POST['fullname'] == '' OR $_POST['phone'] == '' OR $_POST['address'] == '' OR $_POST['gender'] == '') 
        {
            $respon =  array(
                'status' => false,
                'message' => 'Santri ID, Fullname, phone, address dan gender tidak boleh kosong',
                'data' => array()
            );

            echo response($respon, 500);
            
        }
        else
        {
            $update_santri = update_santri();

            if ($update_santri)
            {
                $respon =  array(
                    'status' => true,
                    'message' => 'Berhasil diubah',
                    'data' => array()
                );

                echo response($respon, 200);
            }
            else
            {

                $respon =  array(
                    'status' => false,
                    'message' => 'Gagal diubah',
                    'data' => array()
                );

                echo response($respon, 500);
            }
        }



        break;
    
    default:
        
        $respon = array(
            'status' => false,
            'message' => 'Not Found',
            'data' => array()
        );
        
        echo response($respon, 404);

        break;
}

