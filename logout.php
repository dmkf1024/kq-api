<?php 

require_once('./response.php');
require_once('./file.php');
require_once('./DB.php');
require_once('./util.php');
require_once('./constant.php');

$id = $_GET['id'];
$token = $_GET['token'];

if (!isset($id) || !isset($token)) {
    return Response::show(Constant::CODE_INVALID_PARAM, Constant::HINT_INVALID_PARAM);
}

// 连接数据库
try {
    $conn = DB::getInstance()->connect();
} catch (Exception $e) {
    return Response::show(Constant::CODE_CONNECT_FAILED, Constant::HINT_CONNECT_FAILED);
}

// 查询是否有该教师
$sql = "select id from teacher where id = " . $id;
$result = mysql_query($sql, $conn);
$teacher = mysql_fetch_object($result);
if ($teacher == null) {
    return Response::show(Constant::CODE_NO_USER, Constant::HINT_NO_USER);
}

Util::logout($token, $id);