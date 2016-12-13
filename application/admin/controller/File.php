<?php
/**
 * 文件上传controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;

class File extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 上传图片
	 */
	public function upload_picture(){
		$file = request()->file('image');
	    // 移动到框架应用根目录/public/uploads/ 目录下
		$info = $file
				->validate(['size'=>config('picture_size'),'ext'=>config('picture_ext')])
				->move(config('upload_full_path'));
	    if($info){
	        // 成功上传后 获取上传信息
	        // 输出 jpg
	        //echo $info->getExtension();
	        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
	        //echo $info->getSaveName();
	        // 输出 42a79759f284b767dfcb2a0197904287.jpg
	        //echo $info->getFilename(); 
			$return = [
				'code'	=> '1',
				'msg'	=> '上传成功！',
				'data'	=> [
					'ext' => $info->getExtension(),
					'filepath' => config('upload_path') . $info->getSaveName(),
					'filename' => $info->getFilename()
				]
			];
			return json($return);
	    }else{
	        // 上传失败获取错误信息
	        return $this->error($file->getError());
	    }
	}
	
	/**
	 * keditor编辑器上传图片
	 */
	public function keditor_upload_picture(){
		$file = request()->file('imgFile');
		/* 返回标准数据 */
		$info = $file
				->validate(['size'=>config('picture_size'),'ext'=>config('picture_ext')])
				->move(config('upload_full_path'));
		if($info){
			$return['error']	= 0;
			$return['url']		= str_replace("\\", "/", config('upload_path') . $info->getSaveName());
	    }else{
	        // 上传失败获取错误信息
			$return['error']	= 1;
			$return['message']	= $file->getError();
	    }
		return json($return);
	}
}
