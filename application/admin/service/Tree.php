<?php
/**
 * 树形service
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\service;

class Tree
{
	public function create_menu($menu, $pid=0){
		$menus = array();
		foreach($menu as $val){
			if($val['pid'] == $pid){
				$children = $this->create_menu($menu, $val['id']);
				if($children){
					$val['children'] = $children;
				}
				$menus[] = $val;
			}
		}
		return $menus;
	}
	
	/**
	 * 将格式数组转换为树
	 *
	 * @param array $list
	 * @param integer $level 进行递归时传递用的参数
	 */
	private $formatTree; //用于树型数组完成递归格式的全局变量
	private function _toFormatTree($list,$level=0,$title = 'title') {
		foreach($list as $key=>$val){
			$tmp_str=str_repeat("&nbsp;",$level*2);
			$tmp_str.="└";

			$val['level'] = $level;
			$val['title_show'] =$level==0?$val[$title]."&nbsp;":$tmp_str.$val[$title]."&nbsp;";
				// $val['title_show'] = $val['id'].'|'.$level.'级|'.$val['title_show'];
			if(!array_key_exists('children',$val)){
				array_push($this->formatTree,$val);
			}else{
				$tmp_ary = $val['children'];
				unset($val['children']);
				array_push($this->formatTree,$val);
				   $this->_toFormatTree($tmp_ary,$level+1,$title); //进行下一层递归
			}
		}
		return;
	}

	public function toFormatTree($list,$title = 'title',$pk='id',$pid = 'pid',$root = 0){
		$this->formatTree = array();
		$this->_toFormatTree($list,0,$title);
		return $this->formatTree;
	}
}
