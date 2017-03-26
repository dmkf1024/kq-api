<?php

class File {

    private $_dir;

    // 扩展名
    const EXT = '.txt';

    /**
    * 构造方法
    * dirname(__FILE__) 当前路径
    */
    public function __construct() {
        $this->_dir = dirname(__FILE__).'/files/';
    }

    /**
    * 写入缓存数据
    * @param string key 键
    * @param string value 数据
    * @param int cacheTime 缓存时长
    * return string 读取文件内容
    * return boolean 文件是否写入成功
    */
    public function cacheData($key, $value = '', $cacheTime = 0) {
        $filename = $this->_dir . $key . self::EXT;

        // 将value值写入缓存
        if ($value !== '') {
            if (is_null($value)) {
                // 删除文件
                return @unlink($filename);
            }
            // 获取文件目录
            $dir = dirname($filename);
            if (!is_dir($dir)) {
                mkdir($dir, 0777);
            }

            $cacheTime = sprintf('%011d', $cacheTime);
            return file_put_contents($filename, $cacheTime . json_encode($value));
        }

        // 获取文件内容
        if (!is_file($filename)) {
            return FALSE;
        }

        // 获取文件总内容
        $contents = file_get_contents($filename);
        // 获取文件缓存时长
        $cacheTime= (int)substr($contents, 0, 11);

        // 获取文件有效内容
        $value = substr($contents, 11);

        // 文件是否有效判断 上次访问时间
        // 如果缓存时长+文件创建时间 < 当前时间，则文件无效
        if ($cacheTime != 0 && $cacheTime + fileatime($filename) < time()) {
            // 删除文件
            unlink($filename);
            return FALSE;
        }
        return json_decode($value, true);
    }

    /**
    * 移除文件
    */
    public function removeCache($key) {
        $filename = $this->_dir . $key . self::EXT;

        if (is_file($filename)) {
            unlink($filename);
            return true;
        } else {
            return false;
        }
    }

}

 ?>