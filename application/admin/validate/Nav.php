<?php 

namespace app\admin\validate;
use think\Validate;
class Nav extends Validate
{
	protected $rule=[
		'name'=>'unique:nav|require',
	];
	protected$message=[
		'name.require'=>'栏目名称不得为空！',
		
	];
	protected $scene=[
		'add'=>['name'],
		'edit'=>['name'],

	];

}			

