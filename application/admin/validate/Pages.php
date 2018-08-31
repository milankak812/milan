<?php 
namespace app\admin\validate;

use think\Validate;

class Pages extends Validate
{
	protected $rule=[
		'title'=>'unique:article|require',
        
        'content'=>'require',
	];
	 protected $message=[
        'name.require'=>'文章标题不得为空！',
        'name.unique'=>'文章标题不得重复！',
        
        'content.require'=>'文章内容不得为空！',
    ];

    protected $scene=[
        'add'=>['name','id','content'],
        'edit'=>['name','id'],
    ];
}