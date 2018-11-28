<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomerProvider\TaiSanPhongBanModel;
use App\CustomerProvider\QuanlykhoModel;
use App\CustomerProvider\Lichsubaoduong;
use Carbon\Carbon;
use Auth;



class BaoTriController extends Controller
{
    public function getBaoDuong(){
        $data = \DB::table('tsphongban')->select('MVT','MTB','Ten','Nguoiphutrach','Bophan','Location','thoigianbd')->orderByRaw('thoigianbd asc')->get();
        return view("Admin.BaoTriBaoDuong.BaoDuong")->with('data',$data);
    }

    public function baoDuong(Request $Request){
        $data = \DB::table('tsphongban')->where('MTB',$Request->MTB)->get();
        return $data;
    }

    public function updateBaoDuong(Request $Request){ 
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $now = Carbon::now();
        $MVT = $Request->MVT;
        $MTB = $Request->MTB;
        $Noidung = $Request->Noidung;
        $Ngaythuchien = $now;
        $Ngaybd = $Request->Ngaybd;
        $Chiphi = $Request->Chiphi;
        $tgbd = strtotime(date("Y-m-d", strtotime($Ngaythuchien)) . " +$Ngaybd month");
        $tgbd = strftime("%Y-%m-%d", $tgbd); 
        //Nhập
        $Nhap = new Lichsubaoduong;
        $Nhap->MVT = $MVT;
        $Nhap->MTB = $MTB;
        $Nhap->Noidung = $Noidung;
        $Nhap->Ngaythuchien = $Ngaythuchien;
        $Nhap->Nguoibd = Auth::user()->name;
        $Nhap->Phanloai = "bảo dưỡng";
        $Nhap->Chiphi = $Chiphi;
        $Nhap->save();
        // Cập nhật bảo dưỡng vào bảng tsphongbang
        \DB::table('tsphongban')->where('MTB',$MTB)->update(['Nguoithuchien'=>Auth::user()->name,'thoigianbd'=>$tgbd]);
        return back();
    }

    public function getBaoTri(){        
        return view("Admin.BaoTriBaoDuong.BaoTri");
    }

    public function updateBaoTri(Request $Request){ 
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $now = Carbon::now();
        $MVT = $Request->MVT;
        $MTB = $Request->MTB;
        $Noidung = $Request->Noidung;
        $Ngaythuchien = $now;
        $Ngaybd = $Request->Ngaybd;
        $Chiphi = $Request->Chiphi;
        $tgbd = strtotime(date("Y-m-d", strtotime($Ngaythuchien)) . " +$Ngaybd month");
        $tgbd = strftime("%Y-%m-%d", $tgbd); 
        //Nhập
        $Nhap = new Lichsubaoduong;
        $Nhap->MVT = $MVT;
        $Nhap->MTB = $MTB;
        $Nhap->Noidung = $Noidung;
        $Nhap->Ngaythuchien = $Ngaythuchien;
        $Nhap->Nguoibd = Auth::user()->name;
        $Nhap->Phanloai = "bảo trì";
        $Nhap->Chiphi = $Chiphi;
        $Nhap->save();    
        return back();
    }

    public function getHistory(){
        $data = \DB::table('lichsubaoduong')->join('tsphongban','lichsubaoduong.MTB','=','tsphongban.MTB')->select('lichsubaoduong.*','tsphongban.Ten')->orderByRaw('Ngaythuchien DESC')->get();
        return view("Admin.BaoTriBaoDuong.LichSu")->with('data',$data);
    }
}