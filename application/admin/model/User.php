<?php
/**
 * 用户model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class User extends Model
{
	protected $pk = 'uid';
	
	protected $insert = ['password', 'addtime'];
	
	protected function setPasswordAttr($value)
    {
        return sp_password($value);
    }
	
	protected function setAddtimeAttr()
    {
        return request()->time();
    }
	
	/**
	 * 用户登录认证
	 * @param  string  $username 用户名
	 * @param  string  $password 用户密码
	 * @return integer 登录成功-用户ID，登录失败-错误编号
	 */
	public function login($username, $password){
		$map = [];
		$map['username'] = $username;  
		$map['status'] = 0;
        
		/* 获取用户数据 */
		$temp = $this->where($map)->find();
		if($temp){
			$user = $temp->getData();
			/* 验证用户密码 */
			if(sp_compare_password($password, $user['password'])){
                //登录成功           
                $uid = $user['uid'];
                // 更新登录信息 
                $this->auto_login($user);
				return $uid ; //登录成功，返回用户UID
			} else {
				return -2; //密码错误
			}
		} else {
			return -1; //用户不存在
		}
	}
	
	/**
     * 注销当前用户
     * @return void
     */
    public function logout(){
    	session(config("user_auth_key"), null);
		session(config("admin_auth_key"), null);
        session('user_auth', null);
        session('user_auth_sign', null);
    }
	
	/**
     * 自动登录用户
     * @param  integer $user 用户信息数组
     */
    private function auto_login($user){
        /* 更新登录信息 */
        $data = [
            'lasttime'	=> request()->time(),
            'lastip'	=> request()->ip()
        ];
        $this->save($data,['uid' => $user['uid']]);

        /* 记录登录SESSION和COOKIES */
        $auth = [
            'uid'		=> $user['uid'],
            'username'	=> $user['username'],
            'lasttime'	=> $user['lasttime'],
        ];
		if(is_administrator()){
			session(config("admin_auth_key"), $user['uid']);
		}
		session(config("user_auth_key"), $user['uid']);
        session('user_auth', $auth);
        session('user_auth_sign', data_auth_sign($auth));
    }
	
	/**
	 * 分页获取用户列表
	 * @return array
	 */
	public function page_all_users(){
		$users = [];
		$page = "";
		$map = ['u.is_del' => 0];
		if(!is_administrator()){
			$map['u.uid'] = ['NEQ', config("user_administrator")];
		}
		$objs = $this
				->alias("u")
				->field("u.*, r.role_id AS rid")
				->join("__ROLE_USER__ r", "u.uid = r.user_id", "LEFT")
				->where($map)
				->order('u.addtime DESC')
				->paginate(config('page_size'));
		if($objs){
			foreach($objs as $obj){
				$user = $obj->getData();
				unset($user['password']);
				$user['rid'] = $user['rid'] ? $user['rid'] : 0;
				$users[] = $user;
			}
			$page = $objs->render();
		}
		return ['list'=>$users, 'page'=>$page];
	}

	/**
	 * 根据id获取某个字段的值
	 * @return int|string|mixed
	 */
	public function col_value_by_id($id, $col='uid'){
		return $this->where(['uid'=>$id])->value($col);
	}
}
