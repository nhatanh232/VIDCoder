<?php

namespace App\Http\Controllers\YourProfile\HeThongDiemDanh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile\StaffModel;
use App\Profile\DiemDanhModel;
use App\Profile\HeThongDiemDanh\DANGKYHOCmodel;
use App\Profile\HeThongDiemDanh\DKHOAHOCmodel;
use App\Profile\HeThongDiemDanh\KHOAHOCmodel;
class DiemDanhController extends Controller
{
    public function viewDiemDanh(){
    	return view('Profile.HeThongDiemDanh.index');
    }
    public function CheckDiemDanh(Request $Request){
    	date_default_timezone_set("Asia/Ho_Chi_Minh");
    	$idcard = $Request->idcard;
    	$Staff_ID = StaffModel::where('Id_Card',$idcard)->select('Staff_ID')->get()->first();

    	$find = DANGKYHOCmodel::where('Staff_ID',$Staff_ID->Staff_ID)
    					->where('Start_event','<=',now())
    					->where('End_event','>=',now())
    					->get()->first();
   			
   				$check = DKHOAHOCmodel::where('Class_ID',$find->Class_ID)
   							->where('Start_study','<=',now())
   							->where('End_study','>=',now())
   							->get();
   				if($check->isNotEmpty()){
   					dd($check);
   				}
   				else{
   					dd($check);
   				}
   			
    }
}
