<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 2017/12/7
 * Time: 下午3:55
 */

namespace App\Http\Controllers\Api;

class IndexController extends ApiController
{
    public function index(){

        return $this->message('请求成功');
    }
}