<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile\StaffModel;

class NhanSuController extends Controller
{
    public function ShowInfo(){
    	return view('Admin.ThongTinNhanSu.Information');
    }

    public function getInfo(Request $Request){

    	$data = \DB::table('dsnv')->join('thongtinnhansu','thongtinnhansu.id','=','dsnv.Maid')->where('dsnv.Maid',$Request->id)->select('dsnv.Hoten','dsnv.Manv','dsnv.Phongban','dsnv.Congty','thongtinnhansu.id','thongtinnhansu.Tienmat','thongtinnhansu.Vouncher','thongtinnhansu.Diemtichluy','thongtinnhansu.Diemconghien','thongtinnhansu.Giodaotao','thongtinnhansu.Hinh')->get()->first();


    	return view('Admin.ThongTinNhanSu.ShowInformation')->with('key',$data);
    }
    public function GetTstlcn(Request $Request){
    	$data = \DB::table('taisantlcn')->where('Manv',$Request->Manv)->get();
    	return view('Admin.ThongTinNhanSu.taisanthanhlycn')->with(['data'=>$data]);
    }
     public function getNVInfo(Request $Request){
        $Manv = $Request->Manv;
        $data = \DB::table('STAFF')->where('Staff_ID',$Manv)->get();
        return $data;
    }
}
