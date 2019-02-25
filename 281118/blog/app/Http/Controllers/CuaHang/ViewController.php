<?php

namespace App\Http\Controllers\CuaHang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function index(){
    	$data = \DB::table('BangMaThietBi')->select('MVT',
    		'Ten','Thongso','Donvitinh','Hinh')->get();
    	return view('CuaHang.index')->with('data',$data);
    }
}
