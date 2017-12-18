<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function login()
    {
        return $this->fetch();
    }

    public function register()
    {
        return $this->fetch();
    }

    public function test()
    {
        $content = \Map::getAddressLatLon('天津工业大学');
        var_dump($content);
    }

    public function test1()
    {
        return \Map::getMap('天津工业大学');

    }

    public function test2()
    {
        \Mail::doMail();
    }
}
