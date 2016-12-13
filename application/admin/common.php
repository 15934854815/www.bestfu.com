<?php
/**
 * 密码加密方法
 * @param string $pw 要加密的字符串
 * @param string $key 加密密钥
 * @return string
 */
function sp_password($pw, $key = ''){
    if(empty($key)){
        $key = config("pwd_auth_key");
    }
	$result = "###" . md5(md5("{$key}{$pw}"));
	return $result;
}

/**
 * 密码比较方法,所有涉及密码比较的地方都用这个方法
 * @param string $password 要比较的密码
 * @param string $password_in_db 数据库保存的已经加密过的密码
 * @return boolean 密码相同，返回true
 */
function sp_compare_password($password, $password_in_db){
	return sp_password($password) == $password_in_db;
}

/**
 * 是否登录
 */
function is_login(){
    $user = session('user_auth');
    if (empty($user)) {
        return 0;
    } else {
        return session('user_auth_sign') == data_auth_sign($user) ? $user['uid'] : 0;
    }
}

/**
 * 是否超级管理员
 */
function is_administrator($uid = null){
    $uid = is_null($uid) ? is_login() : $uid;
    return $uid && (intval($uid) === config('user_administrator'));
}

/**
 * 是否管理员
 */
function is_root($uid = null){
    $uid = is_null($uid) ? is_login() : $uid;
    return $uid && (intval($uid) === config('user_root'));
}

/**
 * 产生随机字符串
 * @param $length 字符串长度
 * @param $num 是否纯数字
 * @return string
 */
function random_string($length, $num=false){
	if($num){
		$code_array = array("0","1","2","3","4","5","6","7","8","9");
	}else{
		//"0","1","l","i","o","L","I","O",
		$code_array = array(
			"2", "3", "4", "5", "6", "7", "8", "9",
			"a", "b", "c", "d", "e", "f", "g", "h",
			"j", "k", "m", "n", "p", "q", "r", "s",
			"t", "u", "v", "w", "x", "y", "z",
			"A", "B", "C", "D", "E", "F", "G", "H",
			"J", "K", "M", "N", "P", "Q", "R", "S",
			"T", "U", "V", "W", "X", "Y", "Z"
		);
	}
	$code_length = count($code_array) - 1;
	$code = "";
	for($i=0; $i<$length; $i++){
		$code .= $code_array[mt_rand(0, $code_length)];
	}
	return $code;
}

/**
 * 数据签名认证
 * @param  array  $data 被认证的数据
 * @return string       签名
 */
function data_auth_sign($data) {
    //数据类型检测
    if(!is_array($data)){
        $data = (array)$data;
    }
    ksort($data); //排序
    $code = http_build_query($data); //url编码并生成query字符串
    $sign = sha1($code); //生成签名
    return $sign;
}

/**
 * 数据替换
 */
function int_to_string(&$data,$map=array('status'=>array(1=>'正常',-1=>'删除',0=>'禁用',2=>'未审核',3=>'草稿'))) {
    if($data === false || $data === null ){
        return $data;
    }
    $data = (array)$data;
    foreach ($data as $key => $row){
        foreach ($map as $col=>$pair){
            if(isset($row[$col]) && isset($pair[$row[$col]])){
                $data[$key][$col.'_text'] = $pair[$row[$col]];
            }
        }
    }
    return $data;
}