<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/12/20
 * Time: 22:54
 */
namespace app\api\controller;

use think\Request;

class Image {
    public function upload()
    {
        $pid = Request::instance()->param('pid');
        $citys = model('City')->getCityByParentId($pid);
        return show(1,'success', $citys);
    }
}