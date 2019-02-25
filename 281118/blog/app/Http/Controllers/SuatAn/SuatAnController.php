<?php

namespace App\Http\Controllers\SuatAn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuatAn\SuatAnModel;
use App\SuatAn\NVDKAnModel;
use App\Profile\StaffModel;
use Auth;

class SuatAnController extends Controller
{
    public function viewAn(){        
    	$user = Auth::user()->Manv;
    	return view('suatan.dangkisuatan')->with('user',$user);
    }

    public function menuThang(){
    	$data = \DB::select("exec menuThang");
    	return $data;
    }

    public function postDangKiAn(Request $Request){
    	$MaNV = $Request->MaNV;
    	$ThangDK = $Request->ThangDK;
    	$NamDK = $Request->NamDK;
    	$Ngay1 = $Request->Ngay1;
    	$Ngay2 = $Request->Ngay2;
    	$Ngay3 = $Request->Ngay3;
    	$Ngay4 = $Request->Ngay4;
    	$Ngay5 = $Request->Ngay5;
    	$Ngay6 = $Request->Ngay6;
    	$Ngay7 = $Request->Ngay7;
    	$Ngay8 = $Request->Ngay8;
    	$Ngay9 = $Request->Ngay9;
    	$Ngay10 = $Request->Ngay10;
    	$Ngay11 = $Request->Ngay11;
    	$Ngay12 = $Request->Ngay12;
    	$Ngay13 = $Request->Ngay13;
    	$Ngay14 = $Request->Ngay14;
    	$Ngay15 = $Request->Ngay15;
    	$Ngay16 = $Request->Ngay16;
    	$Ngay17 = $Request->Ngay17;
    	$Ngay18 = $Request->Ngay18;
    	$Ngay19 = $Request->Ngay19;
    	$Ngay20 = $Request->Ngay20;
    	$Ngay21 = $Request->Ngay21;
    	$Ngay22 = $Request->Ngay22;
    	$Ngay23 = $Request->Ngay23;
    	$Ngay24 = $Request->Ngay24;
    	$Ngay25 = $Request->Ngay25;
    	$Ngay26 = $Request->Ngay26;
    	$Ngay27 = $Request->Ngay27;
    	$Ngay28 = $Request->Ngay28;
    	$Ngay29 = $Request->Ngay29;
    	$Ngay30 = $Request->Ngay30;
    	$Ngay31 = $Request->Ngay31;

    	$nhap = new SuatAnModel();
    	$nhap->MaNV = $MaNV;
    	$nhap->ThangDK = $ThangDK;
    	$nhap->NamDK = $NamDK;
    	$nhap->Ngay1 = $Ngay1;
    	$nhap->Ngay2 = $Ngay2;
    	$nhap->Ngay3 = $Ngay3;
    	$nhap->Ngay4 = $Ngay4;
    	$nhap->Ngay5 = $Ngay5;
    	$nhap->Ngay6 = $Ngay6;
    	$nhap->Ngay7 = $Ngay7;
    	$nhap->Ngay8 = $Ngay8;
    	$nhap->Ngay9 = $Ngay9;
    	$nhap->Ngay10 = $Ngay10;
    	$nhap->Ngay11 = $Ngay11;
    	$nhap->Ngay12 = $Ngay12;
    	$nhap->Ngay13 = $Ngay13;
    	$nhap->Ngay14 = $Ngay14;
    	$nhap->Ngay15 = $Ngay15;
    	$nhap->Ngay16 = $Ngay16;
    	$nhap->Ngay17 = $Ngay17;
    	$nhap->Ngay18 = $Ngay18;
    	$nhap->Ngay19 = $Ngay19;
    	$nhap->Ngay20 = $Ngay20;
    	$nhap->Ngay21 = $Ngay21;
    	$nhap->Ngay22 = $Ngay22;
    	$nhap->Ngay23 = $Ngay23;
    	$nhap->Ngay24 = $Ngay24;
    	$nhap->Ngay25 = $Ngay25;
    	$nhap->Ngay26 = $Ngay26;
    	$nhap->Ngay27 = $Ngay27;
    	$nhap->Ngay28 = $Ngay28;
    	$nhap->Ngay29 = $Ngay29;
    	$nhap->Ngay30 = $Ngay30;
    	$nhap->Ngay31 = $Ngay31;
    	$nhap->save();
    	return back();
    }

    public function checkDK(Request $Request){
    	$MaNV = $Request->MaNV;
    	$ThangDK = $Request->ThangDK;
    	$NamDK = $Request->NamDK;
    	$data = \DB::table('SuatAn')->where(['MaNV'=>$MaNV,'ThangDK'=>$ThangDK,'NamDK'=>$NamDK])->get();
    	return $data;
    }

    public function getSuatAnCaNhan(Request $Request){
    	$user = Auth::user()->Manv;
    	return view('suatan.suatancanhan')->with('user',$user);
    }

    public function updateSuatAn(Request $Request){
        $MaNV = $Request->MaNV;
        $ThangDK = $Request->ThangDK;
        $NamDK = $Request->NamDK;
        $Ngay1 = $Request->Ngay1;
        $Ngay2 = $Request->Ngay2;
        $Ngay3 = $Request->Ngay3;
        $Ngay4 = $Request->Ngay4;
        $Ngay5 = $Request->Ngay5;
        $Ngay6 = $Request->Ngay6;
        $Ngay7 = $Request->Ngay7;
        $Ngay8 = $Request->Ngay8;
        $Ngay9 = $Request->Ngay9;
        $Ngay10 = $Request->Ngay10;
        $Ngay11 = $Request->Ngay11;
        $Ngay12 = $Request->Ngay12;
        $Ngay13 = $Request->Ngay13;
        $Ngay14 = $Request->Ngay14;
        $Ngay15 = $Request->Ngay15;
        $Ngay16 = $Request->Ngay16;
        $Ngay17 = $Request->Ngay17;
        $Ngay18 = $Request->Ngay18;
        $Ngay19 = $Request->Ngay19;
        $Ngay20 = $Request->Ngay20;
        $Ngay21 = $Request->Ngay21;
        $Ngay22 = $Request->Ngay22;
        $Ngay23 = $Request->Ngay23;
        $Ngay24 = $Request->Ngay24;
        $Ngay25 = $Request->Ngay25;
        $Ngay26 = $Request->Ngay26;
        $Ngay27 = $Request->Ngay27;
        $Ngay28 = $Request->Ngay28;
        $Ngay29 = $Request->Ngay29;
        $Ngay30 = $Request->Ngay30;
        $Ngay31 = $Request->Ngay31;
        // Cập nhật suất ăn
        \DB::table('SuatAn')->where(['MaNV'=>$MaNV,'ThangDK'=>$ThangDK,'NamDK'=>$NamDK])->update(['Ngay1'=>$Ngay1,'Ngay2'=>$Ngay2,'Ngay3'=>$Ngay3,'Ngay4'=>$Ngay4,'Ngay5'=>$Ngay5,'Ngay6'=>$Ngay6,'Ngay7'=>$Ngay7,'Ngay8'=>$Ngay8,'Ngay9'=>$Ngay9,'Ngay10'=>$Ngay10,'Ngay11'=>$Ngay11,'Ngay12'=>$Ngay12,'Ngay13'=>$Ngay13,'Ngay14'=>$Ngay14,'Ngay15'=>$Ngay15,'Ngay16'=>$Ngay16,'Ngay17'=>$Ngay17,'Ngay18'=>$Ngay18,'Ngay19'=>$Ngay19,'Ngay20'=>$Ngay20,'Ngay21'=>$Ngay21,'Ngay22'=>$Ngay22,'Ngay23'=>$Ngay23,'Ngay24'=>$Ngay24,'Ngay25'=>$Ngay25,'Ngay26'=>$Ngay26,'Ngay27'=>$Ngay27,'Ngay28'=>$Ngay28,'Ngay29'=>$Ngay29,'Ngay30'=>$Ngay30,'Ngay31'=>$Ngay31]);
        return back();
    }

    public function viewAnAdmin(){
        $user = Auth::user()->Manv;
        return view('Admin.SuatAnAdmin.mainSuatAn')->with('user',$user);
    }

    public function getSuatAn(Request $Request){
        $ngay = $Request->ngay;
        $thang = $Request->thang;
        $nam = $Request->nam;
        $data = \DB::select(("exec suatAnData :Param1, :Param2, :Param3"),[':Param1' => $ngay, ':Param2' => $thang, 'Param3' => $nam]);
        return $data; 
    }

    public function getDataSuatAnTmp(Request $Request){
        $thang = $Request->thang;
        $nam = $Request->nam;
        $manv = $Request->manv;
        $bophan = \DB::table('NVDKAn')->select('Department')->where('Staff_ID',$manv)->get()->first();
        $data = \DB::table('SuatAn')->join('NVDKAn','SuatAn.MaNV','=','NVDKAn.Staff_ID')->select('SuatAn.*','NVDKAn.Name')->where(['SuatAn.ThangDK'=>$thang,'SuatAn.NamDK'=>$nam,'NVDKAn.Department'=>$bophan->Department])->get();
        return $data;
    }
}
