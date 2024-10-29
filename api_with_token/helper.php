<?php

/**
 * Kumpulan fungsi untuk API php native
 * 
 * @author Jujun Jamaludin
 * @since 2024-10-25
 */


/**
 * Fungsi untuk generate respon API
 * 
 * @param array $data
 * @param int $code
 * @return json
 */
function response($data, $code)
{
    http_response_code($code);
    header('Content-Type: application/json');
    return json_encode($data);
}

function api_get()
{
    autorized();

    if (isset($_GET['santri_id']) && !empty($_GET['santri_id'])) {
        $get_santri_id = $_GET['santri_id'];

        $get_edit_santri = get_edit_santri();

        if ($get_edit_santri == NULL) {
            $respon = array(
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => array()
            );

            echo response($respon, 404);
            die;
        } else {
            $respon = array(
                'status' => true,
                'message' => 'Sukses',
                'data' => $get_edit_santri
            );
        }
    } else {
        $respon = array(
            'status' => true,
            'message' => 'Sukses',
            'data' => get_list_santri()
        );
    }

    echo response($respon, 200);
}

function api_post()
{
    autorized();
    // validasi tambah
    if ($_POST['fullname'] == '' or $_POST['phone'] == '' or $_POST['address'] == '' or  $_POST['gender'] == '') {
        $respon =  array(
            'status' => false,
            'message' => 'Fullname, phone, address dan gender tidak boleh kosong',
            'data' => array()
        );

        echo response($respon, 400);
    } else {
        $add_santri = add_santri();

        if ($add_santri) {
            $respon =  array(
                'status' => true,
                'message' => 'Berhasil nambah',
                'data' => array()
            );

            echo response($respon, 200);
        } else {

            $respon =  array(
                'status' => false,
                'message' => 'Gagal nambah',
                'data' => array()
            );

            echo response($respon, 400);
        }
    }
}

function api_delete()
{
    autorized();
    // validasi hapus
    $cek_santri = get_edit_santri();

    if ($cek_santri == FALSE) {
        $respon =  array(
            'status' => false,
            'message' => 'Santri tidak ditemukan',
            'data' => array()
        );

        echo response($respon, 404);
    } else {
        $delete_santri = delete_santri();

        if ($delete_santri) {
            $respon =  array(
                'status' => true,
                'message' => 'Behasil menghapus',
                'data' => array()
            );

            echo response($respon, 200);
        } else {
            $respon =  array(
                'status' => false,
                'message' => 'Gagal menghapus',
                'data' => array()
            );

            echo response($respon, 500);
        }
    }
}

function api_put()
{
    autorized();
    $get_body = file_get_contents("php://input"); // jadi data JSON
    $get_json = json_decode($get_body, TRUE); // jadi array data

    $_POST['santri_id'] = $get_json['santri_id'];
    $_POST['fullname'] = $get_json['fullname'];
    $_POST['phone'] = $get_json['phone'];
    $_POST['address'] = $get_json['address'];
    $_POST['gender'] = $get_json['gender'];

    // validasi edit
    if ($_POST['santri_id'] == ''  or $_POST['fullname'] == '' or $_POST['phone'] == '' or $_POST['address'] == '' or $_POST['gender'] == '') {
        $respon =  array(
            'status' => false,
            'message' => 'Santri ID, Fullname, phone, address dan gender tidak boleh kosong',
            'data' => array()
        );

        echo response($respon, 500);
    } else {
        $update_santri = update_santri();

        if ($update_santri) {
            $respon =  array(
                'status' => true,
                'message' => 'Berhasil diubah',
                'data' => array()
            );

            echo response($respon, 200);
        } else {

            $respon =  array(
                'status' => false,
                'message' => 'Gagal diubah',
                'data' => array()
            );

            echo response($respon, 500);
        }
    }
}

function autorized()
{
    // ambil x-api-key dari header
    $get_x_api_key = $_SERVER['HTTP_X_API_KEY'];
    $query_check_token = "SELECT user_id FROM user WHERE token='$get_x_api_key'";
    $check_token = connect_db()->query($query_check_token);

    if ($check_token->num_rows == 0) {
        $respon = array(
            'status' => false,
            'message' => 'Unautorized',
            'data' => array()
        );

        echo response($respon, 401);
        die;
    } else {
        $user = $check_token->fetch_assoc();
        return $user['user_id'];
    }
}
