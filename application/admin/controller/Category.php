<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;


class Category extends Controller
{
    protected $obj;

    public function _initialize()
    {
        $this->obj = model('Category');
    }

    public function index()
    {
        $categorys = $this->obj->getAllCategory(0);
        return $this->fetch('',[
            'categorys'=>$categorys]);
    }

    public function add()
    {
        $categorys = $this->obj->getAllCategory(0);
        return $this->fetch('',[
            'categorys'=>$categorys]);
    }

    public function save(Request $req)
    {
        $data = $req->post();
        $validate = validate('Category');
        $check_result = $validate->scene('save')->check($data);
        if (!$check_result) {
            return $this->error($validate->getError());
        }
        $result = $this->obj->add($data);
        if ($result) {
            $this->success('分类新增成功,编号:'.$result); //这个save()方法返回的好像不是自增的id
        } else {
            $this->error($this->obj->getError());
        }

    }
}
