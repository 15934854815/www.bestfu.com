<?php
/**
 * 后台节点管理model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class Node extends Model
{
	/**
	 * 根据父ID获取所有节点列表
	 * @return array
	 */
	public function nodes_by_pid($pid=0){
		$map = [];
		$map['pid'] = $pid;
		$objs = $this->where($map)->order("sort")->select();
		$nodes = [];
		if($objs){
			foreach($objs as $obj){
				$nodes[] = $obj->getData();
			}
		}
		return $nodes;
	}
	
	/**
	 * 根据父ID分页获取所有节点列表
	 * @return array
	 */
	public function page_nodes_by_pid($pid=0){
		$map = [];
		$map['pid'] = $pid;
		$objs = $this->where($map)->order("sort")->paginate(config('page_size'));
		$nodes = [];
		$page = null;
		if($objs){
			foreach($objs as $obj){
				$nodes[] = $obj->getData();
			}
			$page = $objs->render();
		}
		return ['list'=>$nodes, 'page'=>$page];
	}
	
	/**
	 * 所有可授权节点
	 */
	public function all_authorize_nodes(){
		$map = ["level"=>2];
		if(!is_administrator()){
			$map['develop'] = 1;
		}
		return $this->where($map)->column('title','id');
	}
	
	/**
	 * 所有节点名称
	 * @return array
	 */
	public function all_titles(){
		return $this->column('title','id');
	}
	
	/**
	 * 所有菜单列表
	 * @return array
	 */
	public function all_menus(){
		$menus = [];
		$map = ['status' => 0, 'level' => ["NEQ", 3]];
		if(!is_administrator()){
			$map['develop'] = 1;
		}
		$objs = $this
					->field("id,name,title,pid")
					->where($map)
					->order('sort')
					->select();
		if($objs){
			foreach($objs as $obj){
				$menus[] = $obj->getData();
			}
		}
		return $menus;
	}
	
	/**
	 * 节点详情
	 * @return array
	 */
	public function node_by_id($id, $field="*"){
		if($id){
			$obj = $this->field($field)->find($id);
			if($obj){
				return $obj->getData();
			}
			return [];
		}
		return [];
	}
	
	/**
	 * 根据id获取某个字段的值
	 * @return int|string|mixed
	 */
	public function col_value_by_id($id, $col='id'){
		return $this->where(['id'=>$id])->value($col);
	}
	
	/**
	 * 根据节点ID列表获取父级ID
	 */
	public function pids_by_ids($ids = array()){
		$pids = [];
		if($ids){
			$map = ['id' => ['IN', $ids]];
			$pids = $this->where($map)->column('pid');
			$pids = array_unique($pids);
		}
		return $pids;
	}
}
