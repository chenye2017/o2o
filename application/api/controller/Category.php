<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/12/20
 * Time: 22:54
 */
namespace app\api\controller;

use think\Request;

class Category {
    public function getCategoryByPid()
    {
        $pid = Request::instance()->param('pid');
        $categorys = model('Category')->getCategoryByParentId($pid);
        return show(1,'success', $categorys);
    }
}