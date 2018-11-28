<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Excel, Input , File;
use phpoffice\phpspreadsheet;
use App\DSNVDKA;
use App\User;
class DangkyanController extends Controller
{
    public function table(){
    	return view('test');
    }
    public function getTable(Request $Request){
    		$bang = DSNVDKA::select("Manv","Hoten","Phongban","Congty","Thu2","Thu3","Thu4","Thu5","Thu6","Thang","Tuan","Startdate","Enddate")->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->orderBy('Hoten')->get();
            // thu2
            $admin1= \DB::table('DSNVDKA')->Select()->Where('Thu2','Chay')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count();
            $admin2= \DB::table('DSNVDKA')->Select()->Where('Thu2','Mặn')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count();
            $admin3= \DB::table('DSNVDKA')->Select()->Where('Thu2','Nghỉ')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count(); 
            // thứ 3
              $admin13= \DB::table('DSNVDKA')->Select()->Where('Thu3','Chay')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count();
            $admin23= \DB::table('DSNVDKA')->Select()->Where('Thu3','Mặn')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count();
            $admin33= \DB::table('DSNVDKA')->Select()->Where('Thu3','Nghỉ')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count(); 
               // thứ 4
              $admin14= \DB::table('DSNVDKA')->Select()->Where('Thu4','Chay')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count();
            $admin24= \DB::table('DSNVDKA')->Select()->Where('Thu4','Mặn')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count();
            $admin34= \DB::table('DSNVDKA')->Select()->Where('Thu4','Nghỉ')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count(); 
               // thứ 5
              $admin15= \DB::table('DSNVDKA')->Select()->Where('Thu5','Chay')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count();
            $admin25= \DB::table('DSNVDKA')->Select()->Where('Thu5','Mặn')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count();
            $admin35= \DB::table('DSNVDKA')->Select()->Where('Thu5','Nghỉ')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count(); 
               // thứ 6
              $admin16= \DB::table('DSNVDKA')->Select()->Where('Thu6','Chay')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count();
            $admin26= \DB::table('DSNVDKA')->Select()->Where('Thu6','Mặn')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count();
            $admin36= \DB::table('DSNVDKA')->Select()->Where('Thu6','Nghỉ')->where("Tuan",$Request->Tuan)->Where("Thang",$Request->Thang)->count(); 
    		return view('thunghiem')->with('ds',$bang)->with('tongphan1',$admin1)->with('tongphan2',$admin2)->with('tongphan3',$admin3)->with('tongphan13',$admin13)->with('tongphan23',$admin23)->with('tongphan33',$admin33)->with('tongphan14',$admin14)->with('tongphan24',$admin24)->with('tongphan34',$admin34)->with('tongphan15',$admin15)->with('tongphan25',$admin25)->with('tongphan35',$admin35)->with('tongphan16',$admin16)->with('tongphan26',$admin26)->with('tongphan36',$admin36);

           
    }
    public function Dangkyan(Request $Request){
    	$update = Auth::user()->Manv;
    	\DB::table('DSNVDKA')->Where('Manv',$update)->Where('Thang',$Request->Thang)->Where('Tuan',$Request->Tuan)->update(['Thu2'=> $Request->Thu2,
    		'Thu3'=> $Request->Thu3,
    		'Thu4'=> $Request->Thu4,
    		'Thu5'=> $Request->Thu5,
    		'Thu6'=> $Request->Thu6,
    	]);
    		return redirect()->back();
    }
    public function Timkiemten(Request $Request){
        if ($Request -> has('search')){
            $data['actor'] = \DB::table('DSNVDKA')->Where('Hoten','like',$Request->hoten)->Where('Thang',$Request->Thang)->Where('Tuan',$Request->Tuan)->get();
        }
        return view('timkiem',$data);
    }
}
