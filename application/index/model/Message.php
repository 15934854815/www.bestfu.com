<?php
/**
 * 留言model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\model;
use think\Model;

class Message extends Model
{
	/**
	 * 自动完成
	 */
	protected $insert = ['addtime'];
	
	/**
	 * 字段addtime自动完成
	 */
	protected function setAddtimeAttr()
    {
        return request()->time();
    }
}
