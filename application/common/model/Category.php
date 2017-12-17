<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
    protected $autoWriteTimestamp = true;

    public function add($data)
    {
        $data['status'] = 1;
        return $this->save($data);   //这个save操作直接返回id了
    }

    public function getAllCategory($parent_id = 0)
    {
        $where = [
            'status' => ['neq', -1], //1应该代表未删除
            'parent_id' => $parent_id  //父亲id
        ];
        $order = [
            'listorder'=>'desc',
            'id'=> 'desc'
        ];
        return $this->where($where)->order($order)->paginate();
    }
}