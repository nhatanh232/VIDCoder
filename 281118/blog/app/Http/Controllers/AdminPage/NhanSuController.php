<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile\StaffModel;
use App\SuatAn\NVDKAnModel;
use App\SuatAn\DelegateModel;

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
        $data = \DB::table('NVDKAn')->where('Staff_ID',$Manv)->get();
        return $data;
    }

    public function getStaffInDepartment(Request $Request){
        $department = $Request->BoPhan;
        $data = \DB::table('STAFF')->where(['Department'=>$department,'End_work'=>null])->get();
        return $data;
    }

    public function checkDelegate(Request $Request){
        $id = $Request->Staff_ID;
        $data = \DB::table('Delegate')->where('Staff_ID',$id)->get();
        return $data;
    }

    public function getStaffNotRegis(Request $Request){
        $department = $Request->Department;
        $thang = $Request->ThangDK;
        $nam = $Request->NamDK;
        $name = $Request->Name;
        $data = \DB::select(\DB::raw("select t1.Name from NVDKAn t1 left join SuatAn t2 ON t2.MaNV = t1.Staff_ID where [Group] = (select top 1 [Group] from NVDKAn where Department = N'$department') and (t2.ThangDK != '$thang' or t2.ThangDK is null) and (t2.NamDK = '$nam' or t2.NamDK is null) and t1.Name like N'%$name%'"));
        return $data;
    }
}
