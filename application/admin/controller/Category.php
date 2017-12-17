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

    public function index(Request $req)
    {
        $id = $req->route('id', 0);
        $categorys = $this->obj->getAllCategory($id);
        return $this->fetch('',[
            'categorys'=>$categorys]);
    }

    /**
     * 这个是新增分类的那个弹出框
     * @param Request $req
     * @return mixed
     */
    public function add(Request $req)
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

        if ($data['id']) {
            $this->update($data);
        }

        $result = $this->obj->add($data);
        if ($result) {
            $this->success('分类新增成功,编号:'.$result); //这个save()方法返回的好像不是自增的id
        } else {
            $this->error($this->obj->getError());
        }

    }

    public function update($data)
    {
        $result = $this->obj->save($data, ['id'=>intval($data['id'])]);
        if ($result) {
            $this->success('保存成功');
        } else {
            $this->error('保存失败');
        }
    }

    /**
     * 这个是点击修改的时候，打开的弹出层页面
     * @param int $id
     * @return mixed
     */
    public function edit()
    {
        $id = Request::instance()->param('id');
        if (intval($id) < 1) {
            $this->error('参数错误');
        }

        $category_info = $this->obj->get($id);
        $categorys = $this->obj->getAllCategory(0);
        return $this->fetch('',[
            'categorys'=>$categorys,
            'category_info'=>$category_info]);
    }

    public function listorder()
    {
        $id = Request::instance()->param('id');
        $listorder = Request::instance()->param('listorder');
        $data = ['id'=>$id, 'listorder'=>$listorder];
        $result = $this->obj->save(['listorder'=>$listorder], ['id'=>$data['id']]);
        if ($result) {
            $this->result($_SERVER['HTTP_REFERER'], 1, '修改成功');
        } else {
            $this->result($_SERVER['HTTP_REFERER'], 0, '修改失败');
        }
    }

    public function status()
    {
        $id = Request::instance()->param('id');
        $status = Request::instance()->param('status');
        $result = $this->obj->save(['status'=>$status], ['id'=>$id]);
        if ($result) {
            $this->success('状态修改成功');
        } else {
            $this->error('状态修改失败');
        }
    }
}
