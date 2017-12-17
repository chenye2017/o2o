<?php
namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule = [
        ['name', 'require|max:10', '分类名必须有|分类名称不能多于10个字符'],
        ['parent_id', 'number'],
        ['id', 'number'],
        ['status', 'number|in:-1,0,1', '状态必须是数字|状态值不合法'],
        ['listorder', 'number']
    ];

    protected $scene = [
        'save'=>['name', 'parent_id', 'id'],//添加的时候验证的字段
        'listorder'=>['id', 'listorder'] //排序
    ];
}
