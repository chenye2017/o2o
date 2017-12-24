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
use think\File;

class Image extends Controller {
    public function upload()
    {
        //$fileTemp = Request::instance()->file('file');
        $upload = request()->file();
        $fileTemp = $upload['Filedata'];
        $file = $fileTemp->move('image');
        $filename = '/image/';
        $filename = $filename.$file->getSavename();
        if ($upload) {
            return show(1, 'success', ['filename'=>$filename]);
        } else {
            return show(0, 'error', $upload->getError());
        }

    }
}