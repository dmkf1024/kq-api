<?php

class Util {

    /**
	 * 生成六位随机数作为token
	 */
    static public function genToken() {
        return mt_rand(100000, 999999);
    }

    /**
    * 验证token是否有效
    */
    static public function isTokenValid($token, $id) {
        // 验证token是否有效
        $file = new File();
        // 获取token缓存文件的内容
        $data = $file->cacheData('token_' . $id);

        // 如果缓存文件不存在，说明未处于登录状态
        if ($data == null) {
            Response::show(Constant::CODE_LONG_TIME_NO_LOGIN, Constant::HINT_LONG_TIME_NO_LOGIN);
            return false;
        }

        // 如果输入的token与获取的token一致
        if ($data == $token) {
            return true;
        }
        // 如果不一致
        Response::show(Constant::CODE_INVALID_TOKEN, Constant::HINT_INVALID_TOKEN);
        return false;
    }

    /**
	 * 退出登录操作
	 */
    static public function logout($token, $id) {
        // 声明一个文件
        $file = new File();
        // 文件名
        $fileName = 'token_' . $id;
        // 获取token缓存文件的内容
        $data = $file->cacheData($fileName);

        // 如果缓存文件不存在，说明未处于登录状态
        if ($data == null) {
            Response::show(Constant::CODE_NOT_ONLINE, Constant::HINT_NOT_ONLINE);
        }

        // 如果输入的token与获取的token一致
        if ($data == $token) {
            // 如果token有效
            if ($file->removeCache($fileName)) {
                Response::show(601, Constant::CODE_601);
            } else { // 如果token已过时
                Response::show(Constant::CODE_LONG_TIME_NO_LOGIN, Constant::HINT_LONG_TIME_NO_LOGIN);
            }
        } else {
            // 如果不一致
            Response::show(Constant::CODE_INVALID_TOKEN, Constant::HINT_INVALID_TOKEN);
        }
    }
}

 ?>