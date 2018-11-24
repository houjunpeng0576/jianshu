<?php
/**
 * Created by PhpStorm.
 * User: sunxitong
 * Date: 2018/5/6
 * Time: 23:12
 */

namespace App\Http\Admin\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('admin.index.index');
    }
}