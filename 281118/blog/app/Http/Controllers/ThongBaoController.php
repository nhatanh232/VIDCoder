<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongbaoModel;
class ThongBaoController extends Controller
{
    public function getThongBao(Request $Request){
    	$tintuc = ThongbaoModel::orderBy('Date')->take(4)->get();
    	return view('thongbao.thongbao',compact('tintuc'));
    }
    public function getThongbaodetail(Request $Request){
    	// $tintuc = \DB::table('thongbao')->Select()->where('id',$Request->buttonid)->get();
    	$tintuc =  \DB::table('thongbao')->where('id',$Request->tintuc)->get();
    	return view('thongbao.thongbao')->with('tintuc',$tintuc);
    }
}
