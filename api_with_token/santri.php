<?php 
// Turn off all error reporting
// error_reporting(0);

require_once "helper.php";
require_once "../functions.php";

$request_method = $_SERVER['REQUEST_METHOD'];

switch ($request_method) 
{
    case 'GET':
        api_get();
        break;
    
    case 'POST':
        api_post();
        break;
    
    case 'DELETE':
        api_delete();
        break;
    
    case 'PUT':
        api_put();
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

