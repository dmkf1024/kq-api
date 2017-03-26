<?php

require_once('./DB.php');
require_once('./response.php');
require_once('./util.php');
require_once('./file.php');
require_once('./constant.php');

$teacherId = $_GET['teacherId'];
$token = $_GET['token'];
$courseId = $_GET['courseId'];

if (!isset($token) || !isset($teacherId) || !isset($courseId)) {
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

// 查询课程
$sql = "select * from course where id = " . $courseId;
$result = mysql_query($sql, $conn);
$course = mysql_fetch_object($result);
if ($course == null) { // 未找到课程
    return Response::show(Constant::CODE_NO_COURSE, Constant::HINT_NO_COURSE);
}

// 查询课程对应的学生ID
$sql = "select * from student 
    inner join course_student 
    on student.id = course_student.student_id 
    where course_student.course_id = " . $courseId;
$result = mysql_query($sql, $conn);
while ($student = mysql_fetch_object($result)) {
    $students[] = $student;
}
$output['course'] = $course;
$output['students'] = $students;

return Response::show(Constant::CODE_SUCCESS, Constant::HINT_QUERY_SUCCESS, $output);

?>