<?php
namespace app\common\model;

use think\Model;

class City extends Model {
    public function getCityByParentId($pid)
    {
        $where = [
            'status' => 0,
            'parent_id' => $pid
        ];
        $order = [
            'listorder'=>'desc',
            'id'=>'desc'
        ];
        return $this->where($where)->order($order)->select();
    }
}
