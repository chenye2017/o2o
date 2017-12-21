<?php
namespace app\bis\controller;

use think\Controller;

class Register extends Controller{
    public function index()
    {
        $first_city = model('City')->getCityByParentId(0);
        $first_category = model('Category')->getCategoryByParentId(0);
        $this->assign('first_category', $first_category);
        $this->assign('first_city', $first_city);
        return $this->fetch();
    }
}