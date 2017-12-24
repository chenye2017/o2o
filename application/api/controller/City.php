<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/12/20
 * Time: 22:54
 */
namespace app\api\controller;

use think\Controller;
use think\Request;


class City extends Controller {
    public function getCityByPid()
    {
        $pid = Request::instance()->post('pid');
        $city = model('City')->getCityByParentId($pid);
        return show(1, 'success', $city);
    }
}