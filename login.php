<?php 

require_once('./response.php');
require_once('./file.php');
require_once('./DB.php');
require_once('./util.php');

$output = array();

$mobile = $_GET['mobile'];
$password = $_GET['password'];

// 如果手机号或密码未输入
if (!isset($mobile) || !isset($phone)) {
    Response::show(Constant::CODE_INVALID_PARAM, Constant::HINT_INVALID_PARAM);
}

// 查询语句
$sql = "select id from "


?>