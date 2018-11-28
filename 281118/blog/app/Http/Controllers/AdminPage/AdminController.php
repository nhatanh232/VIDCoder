<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\CustomerProvider\SoTrungThuongModel;
use App\Events\CustomerProvider\Redis;
use App\CustomerProvider\QuaySoTrungThuongModel;
use Excel;
class AdminController extends Controller
{
    public function getInformationNV(){
    	$data = \DB::table('dsnv')->join('users','dsnv.Manv','=','users.Manv')->select('dsnv.Manv','dsnv.Hoten','dsnv.Phongban','dsnv.Congty','users.Authen','users.Quanlykho','users.Thanhlygt','users.Thongbao','users.Nhaplieu')->get();
    	return view("Admin.AdminControl.Phanquyen")->with('data',$data);
    }
    public function AuthenQLKho(Request $Request){
    	$Manv = $Request->Manv;
    	$chon = $Request->chon;
    	\DB::table('users')->where('Manv',$Manv)->update(['Quanlykho'=>$chon]);
    	return 'Success';
    }
     public function AuthenThanhlygt(Request $Request){
    	$Manv = $Request->Manv;
    	$chon = $Request->chon;
    	\DB::table('users')->where('Manv',$Manv)->update(['Thanhlygt'=>$chon]);
    	return 'Success';
    }
     public function AuthenThongbao(Request $Request){
    	$Manv = $Request->Manv;
    	$chon = $Request->chon;
    	\DB::table('users')->where('Manv',$Manv)->update(['Thongbao'=>$chon]);
    	return 'Success';
    }
     public function AuthenNhapLieu(Request $Request){
        $Manv = $Request->Manv;
        $chon = $Request->chon;
        \DB::table('users')->where('Manv',$Manv)->update(['Nhaplieu'=>$chon]);
        return 'Success';
    }
    public function AuthenAdmin(Request $Request){
    	$Manv = $Request->Manv;
    	$chon = $Request->chon;
    	if($chon == 1)
    	\DB::table('users')->where('Manv',$Manv)->update(['Authen'=>'Admin']);
    else
    	\DB::table('users')->where('Manv',$Manv)->update(['Authen'=>'User']);
    	return 'Success';
    }
    public function QuaysoAdmin(){
          $Ngaybatdau = Carbon::create(2018,10,13,11,0,0);
        $Ky = \DB::table('sotrungthuong')->orderBy('Ki','DESC')->get()->first();
        $Tinhngay = $Ky->Ki * 7 ;

        $Ngayxo = $Ngaybatdau->modify('+'.$Tinhngay.' day');
        $data = \DB::table('sotrungthuong')->where('Ngay','=',$Ngayxo)->get();
        $player = \DB::table('quaysotrungthuong')->where('Ngayxo',$Ngayxo)->get();
        return view('Admin.AdminControl.Quayso')->with(['data'=>$data,'player'=>$player]);
    }
    public function postSo(Request $Request){
        $n = $Request->n;
        $value = $Request->value;
          $Ngaybatdau = Carbon::create(2018,10,13,11,0,0);
        $Ky = \DB::table('sotrungthuong')->orderBy('Ki','DESC')->get()->first();
        $Tinhngay = $Ky->Ki * 7 ;

        $Ngayxo = $Ngaybatdau->modify('+'.$Tinhngay.' day');


        $nhap = SoTrungThuongModel::find($Ngayxo);
        $nhap->$n = $value;
        $nhap->save();
        event(
                $e = new Redis($nhap)
            );
        return 'OK';
    }
     public function deleteSo(Request $Request){
        $Ky = \DB::table('sotrungthuong')->orderBy('Ki','DESC')->get()->first();
        $ki = $Ky->Ki;
        $new = null;
        \DB::table('sotrungthuong')->where('ki',$ki)->update(['Solan1'=>$new, 'Solan2'=>$new,'Solan3'=>$new]);
        return "Update";
    }
    public function ImportDSquay(Request $Request){
        ini_set('memory_limit', '256M');
        Excel::selectSheets(array('Form'))->load($Request->file,function($reader){
              $scan = $reader->get(array('a','c','d','e','f','g','h','o'));
        
            foreach ($scan as $key ) {
                $import = new QuaySoTrungThuongModel;
                $import->Staff_ID = $key->o;
                $import->Bophan = $key->d;
                $import->Congty = $key->c;
                $import->Hoten = $key->e;
                $import->Ngayxo = $key->a;
                $import->Lan1 = $key->f;
                $import->Lan2 = $key->g;
                $import->Lan3 = $key->h;
                $import->Trangthaidb = 0;
                $import->Trangthaikk = 0;
                $import->save();
               
                }
        });    
     return back();

        

    }

      public function Tableau(){
        
        return view('Profile.tableau');
    }

}
