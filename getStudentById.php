<?php

require_once('./DB.php');
require_once('./response.php');
require_once('./util.php');
require_once('./file.php');
require_once('./constant.php');

$teacherId = $_GET['teacherId'];
$token = $_GET['token'];
$studentId = $_GET['studentId'];

if (!isset($token) || !isset($teacherId) || !isset($studentId)) {
    return Response::show(Constant::CODE_INVALID_PARAM, Constant::HINT_INVALID_PARAM);
}

// 连接数据库
try {
    $conn = DB::getInstance()->connect();
} catch (Exception $e) {
    return Response::show(Constant::CODE_CONNECT_FAILED, Constant::HINT_CONNECT_FAILED);
}

// 查询是否有该教师
$sql = "select id, name, phone from teacher where id = " . $teacherId;
$result = mysql_query($sql, $conn);
$teacher = mysql_fetch_object($result);
if ($teacher == null) {
    return Response::show(Constant::CODE_NO_USER, Constant::HINT_NO_USER);
}

// 验证token是否有效
if (!Util::isTokenValid($token, $teacherId)) {
    return Response::show(Constant::CODE_INVALID_TOKEN, Constant::HINT_INVALID_TOKEN);
}

// 查询学生
$sql = "select * from student where id = " .$studentId;
$result = mysql_query($sql, $conn);
$student = mysql_fetch_object($result);
if ($student == null) { // 未找到该学生
    return Response::show(Constant::CODE_NO_STUDENT, Constant::HINT_NO_STUDENT);
}

$output['student'] = $student;

return Response::show(Constant::CODE_SUCCESS, Constant::HINT_QUERY_SUCCESS, $output);



?>