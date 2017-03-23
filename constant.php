<?php

class Constant {

    const CODE_CONNECT_OUT = 410;
    const HINT_CONNECT_OUT = '连接不到数据库';
    const CODE_LONG_TIME_NO_LOGIN = 413;
    const HINT_LONG_TIME_NO_LOGIN = '长时间未处于登录状态，已退出登录';
    const CODE_NOT_ONLINE = 414;
    const HINT_NOT_ONLINE = '当前用户未处于登录状态';
    const CODE_NO_USER = 411;
    const HINT_NO_USER = '用户不存在';
    const CODE_LOGIN_ERROR = 412;
    const HINT_LOGIN_ERROR = '用户名或密码错误';
    const CODE_INVALID_TOKEN = 415;
    const HINT_INVALID_TOKEN = '无效的Token';
    const CODE_INVALID_PARAM = 416;
    const HINT_INVALID_PARAM = '参数不合法';

    const CODE_LOGIN_SUCCESS = 600;
    const HING_LOGIN_SUCCESS = '登录成功';
    const CODE_LOGOUT_SUCCESS = 601;
    const HING_LOGOUT_SUCCESS = '退出登录成功';

}

 ?>