<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\CustomerProvider\SoTrungThuongModel;
use App\Events\CustomerProvider\Redis;
use App\CustomerProvider\QuaySoTrungThuongModel;
use App\Profile\BangChoDuyetModel;
use App\Profile\DiemDanhModel;
use App\Profile\StaffModel;
use Auth;
use Excel;
class AdminController extends Controller
{
    public function getInformationNV(){
    	$data = \DB::table('dsnv')->join('users','dsnv.Manv','=','users.Manv')->select('dsnv.Manv','dsnv.Hoten','dsnv.Phongban','dsnv.Congty','users.Authen','users.Quanlykho','users.Thanhlygt','users.Thongbao','users.Nhaplieu','users.TSPB')->get();
    	return view("Admin.AdminControl.Phanquyen")->with('data',$data);
    }
    public function AuthenQLKho(Request $Request){
    	$Manv = $Request->Manv;
    	$chon = $Request->chon;
    	\DB::table('users')->where('Manv',$Manv)->update(['Quanlykho'=>$chon]);
    	return 'Success';
    }
    public function AuthenTSPB(Request $Request){
        $Manv = $Request->Manv;
        $chon = $Request->chon;
        \DB::table('users')->where('Manv',$Manv)->update(['TSPB'=>$chon]);
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
    public function importNgaysinh(Request $Request){
        $file = $Request->file;
        ExceL::load($file,function($reader){
            $data = $reader->get(array('id','dob'));
    $checkStaff = \DB::table('STAFF')->get();
            foreach($data as $key){
                $datetime = $key->dob;
                if($datetime != null)
                {   $cut = explode('-', $datetime);
                    $month = $cut[0];
                    $day = $cut[1];
                    $year= $cut[2];
                    $DOB = Carbon::create($year,$month,$day,0,0,0,'Asia/Ho_Chi_Minh');
                    $update = StaffModel::find($key->id);
                    $update->DOB = $DOB;
                    $update->save();
                }
            }
        });
    }
      public function Tableau(){
        
        return view('Profile.tableau');
    }
    public function DuyetGioDaoTao(){
        $data = BangChoDuyetModel::join('STAFF','BangChoDuyet.Staff_ID','=','STAFF.Staff_ID')->select('BangChoDuyet.*','STAFF.Full_name')
        ->where('BangChoDuyet.Status',0)
        ->get();
        return view('Admin.AdminControl.GioDaoTao_view.DuyetGioDaoTao')->with('data',$data);
    }
    public function pDuyetGioDaoTao(Request $Request){
            $id = $Request->id;
            $action = $Request->action;
            $insert = BangChoDuyetModel::where('Id',$id)->get()->first();
            if($action==1){
                $update = BangChoDuyetModel::find($id);
                $update->Status = 1 ;
                $update->Nguoiduyet = Auth::user()->name;
                $update->save();
                // insert 
                $nhap = new DiemDanhModel;
                $nhap->Staff_ID = $insert->Staff_ID;
                $nhap->Event_Name  = $insert->Event_Name;
                $nhap->Event_Date = $insert->Event_Date;
                $nhap->Categories = $insert->Categories;
                $nhap->Hours = $insert->Hours;
                $nhap->save();

                return 'Đã Duyệt';
            }
            else{
                $update = BangChoDuyetModel::find($id);
                $update->Comment = $Request->Comment;
                $update->Nguoiduyet = Auth::user()->name;
                $update->save();

                return 'Đã phản hồi';
            }
    }
}
