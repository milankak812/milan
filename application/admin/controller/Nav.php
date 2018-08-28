<?php 
namespace app\admin\controller;
use app\admin\model\Nav as NavModel;
use app\admin\controller\Common;

class  Nav  extends Common
{
	public function index(){
		$nav = new NavModel();
		if(request()->isPost()){
			$sorts=input('post.');
			foreach ($sorts as $k => $v) {
				$cate->update(['id'=>$k,'sort'=>$v]);
			}
			$this->success('更新排序成功！',url('index'));
			return;
		}
		$navres=$nav->navtree();
	
		$this->assign('navres',$navres);
		return  view();
	}

	public function add(){
		
		if(request()->isPost()){
			$data=input('post.');
			$validate=\think\Loader::validate('Nav');
			if(!$validate->scene('add')->check($data)){
				$this->error($validate->getError());
			}
			$add=db('nav')->insert($data);
			
			if($add){
				$this->success('添加栏目成功！',url('index'));
			}else{
				$this->error('添加栏目失败！',url('index'));
			}
			
		}
		$nav = new NavModel();
		$navres=$nav->navtree();
		$this->assign('navres',$navres);
		return view();
	}
	public function edit(){
		$nav = new NavModel();
		if(request()->isPost()){
			$data=input('post.');
			$validate=\think\Loader::validate('Nav');
			if(!$validate->scene('edit')->check($data)){
				$this->error($validate->getError());
			}
			$edit=$nav->save($data,['id'=>$data['id']]);
			if($edit!==false){
				$this->success('修改栏目成功！',url('index'));
			}else{
				$this->error('修改栏目失败！',url('index'));
			}
			return;
		}
		$navs=$nav->find(input('id'));
		$navres=$nav->navtree();
		$this->assign(array(
			'navs'=>$navs,
			'navres'=>$navres,

			));
		return view();
	}
} 