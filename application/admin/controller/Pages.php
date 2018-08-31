<?php 
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Pages as PagesModel;
class Pages extends Common
{
	public function index(){
			$pagers= db('pages')->select();
			$this->assign('pagers',$pagers);

		return view();
	}
	public function add(){
		$pages= new PagesModel();
		if(request()->isPost()){
			$data=input('post.');
			$validate = \think\Loader::validate('Pages');
			if(!$validate->scene('add')->check($data)){
				$this->error($validate->getError());
			}
			
			if($pages->save($data)){
				$this->success('添加专题页成功！',url('index'));
			}else{
				$this->error('添加专题页失败！');
			}
			return;
		}
		
		$pags=$pages->pagetree();
		$this->assign('pags',$pags);
		return view();
	}
}