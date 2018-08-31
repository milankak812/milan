<?php 
namespace app\admin\model;
use think\Model;
class Pages extends Model

{

	public function pagetree(){
		$pages=new Pages();
		$pgs=$pages->select();
		return $this->sort($pgs);
	}
	public function sort($data,$pid=0,$level=0){
		static $arr=array();
			foreach ($data as $k => $v) {
				if($v['pid']==$pid){
					$v['level']=$level;
					$arr[]=$v;
					$this->pagetree($data,$v['id'],$level+1);
				}
			}
			return $arr;
	}
}