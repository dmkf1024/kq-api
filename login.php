<?php 

require_once('./response.php');
require_once('./file.php');
require_once('./DB.php');
require_once('./util.php');
require_once('./constant.php');

// require 'vendor/autoload.php';
use kq\kq\TeacherQuery;

$output = array();

$phone = $_GET['phone'];
$password = $_GET['pwd'];

// 如果手机号或密码未输入
if (!isset($phone) || !isset($password)) {
    Response::show(Constant::CODE_INVALID_PARAM, Constant::HINT_INVALID_PARAM);
}

// 连接数据库
try {
    $conn = DB::getInstance()->connect();
} catch (Exception $e) {
    return Response::show(Constant::CODE_CONNECT_FAILED, Constant::HINT_CONNECT_FAILED);
}

// 查询是否有该用户
$sql = "select id from teacher where phone = " . $phone;
$result = mysql_query($sql, $conn);
if ($result == false) {
    return Response::show(Constant::CODE_NO_USER, Constant::HINT_NO_USER);
}

// 验证用户名密码是否在正确
$sql = "select id from teacher where phone = " . $phone . " and pwd = " . $password;
$result = mysql_query($sql, $conn);
$teacher = mysql_fetch_object($result);
if ($teacher == null) { // 用户名或密码错误
    return Response::show(Constant::CODE_ACCESS_DENIED, Constant::HINT_ACCESS_DENIED);
} else {
    // 生成token
    $token = Util::genToken();
    $output['id'] = $teacher->id;
    $output['token'] = $token;

    // 缓存文件，建立长连接
    $cache = new File();
    $filename = "token_" . $id;
    if ($cache->cacheData($filename, $token, 4 * 60 * 60)) { // 登录成功
        return Response::show(Constant::CODE_SUCCESS, Constant::HINT_LOGIN_SUCCESS, $output);
    } else { // token缓存失败
        return Response::show(Constant::CODE_CACHE_FAILED, Constant::HINT_CACHE_FAILED, $output);
    }
}

// // 查询该账号是否有注册
// $isRegistered = TeacherQuery::create()
//     ->filterByPhone($phone)
//     ->find();

// if ($isRegistered) { // 用户存在
//     $teacher = TeacherQuery::create()
//         ->filterByPhone($phone)
//         ->filterByPwd($password)
//         ->find();
//     if ($teacher) { // 登录成功
//         // 生成token
//         $token = Util::genToken();
//         // 用户ID
//         $id = $teacher.getId();
//         // 声明缓存文件
//         $cache = new File();
//         // 缓存文件名字
//         $fileName = "token_" . $id;
//         // 缓存文件4小时
//         if ($cache->cacheData($filename, $token, 4 * 60 * 60)) { // 登录成功
//             $output['id'] = $id;
//             $output['token'] = $token;
//             return Response::show(Constant::CODE_LOGIN_SUCCESS, Constant::HINT_LOGIN_SUCCESS);
//         } else { // 缓存写入失败
//             return Response::show(Constant::CODE_CACHE_FAILED, Constant::HINT_CACHE_FAILED);
//         }
//     } else { // 用户名或密码错误
//         return Response::show(Constant::CODE_LOGIN_FAILED, Constant::HINT_LOGIN_FAILED);
//     }
// } else { // 没有该用户
//     return Response::show(Constant::CODE_NO_USER, Constant::HINT_NO_USER);
// }

?>