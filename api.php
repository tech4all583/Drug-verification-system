<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2/26/21
 * Time: 1:28 PM
 */

require_once 'config/core.php';

header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, PATCH, DELETE');

$action_data = @$_POST;
$data = array();

switch ($action_data['action']){
    case 'verify' :
        break;
    default;
}