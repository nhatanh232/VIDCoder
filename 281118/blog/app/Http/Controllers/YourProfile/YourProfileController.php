<?php

namespace App\Http\Controllers\YourProfile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
class YourProfileController extends Controller
{
    public function getYouProfile()
    {		
    	$Conghien = \DB::table('Diemdanh')->where('Staff_ID',Auth::user()->Manv)->orderBy('created_at','DESC')->get();

        $Tamly = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'TL'])->get()->first();
        $Chuyenmon = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'CM'])->get()->first();
        $Kynang = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'KN'])->get()->first();
        $Kienthuc = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'KT'])->get()->first();
        $Congdong = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'CĐ'])->get()->first();
        $Thechat = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'TC'])->get()->first();
       
    	return view('YourProfile.index')->with(['Conghien'=>$Conghien,
            'Tamly'=>$Tamly,
            'Chuyenmon'=>$Chuyenmon,
            'Kynang'=>$Kynang,
            'Kienthuc'=>$Kienthuc,
            'Congdong'=>$Congdong,
            'Thechat'=>$Thechat
        ]);
    }
    public function ChartCH(){
        $start = \DB::table("STAFF")->where('Staff_ID',Auth::user()->Manv)->select('Start_work')->get()->first();
        $date = new \DateTime($start->Start_work);
        $year = $date->format('Y');
         $month = $date->format('m');

    		$data = \DB::table('diemconghien')->where('Staff_ID',Auth::user()->Manv)
            ->where('Month','>=',$month)->where('Year','>=',$year)
            ->orderBy('created_at','ASC')->get();

    		return $data;
    }
    public function Chartpage(){
    	return view('YourProfile.charts');
    }
    public function ChartDaoTao(){
         $Tamly = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'TL'])->get()->first();
        $Chuyenmon = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'CM'])->get()->first();
        $Kynang = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'KN'])->get()->first();
        $Kienthuc = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'KT'])->get()->first();
        $Congdong = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'CĐ'])->get()->first();
        $Thechat = \DB::table('BangDaoTao')->where(['Staff_ID'=>Auth::user()->Manv,'Categories'=>'TC'])->get()->first();
        return array([
            'Tamly'=>$Tamly->Diem,
            'Chuyenmon'=>$Chuyenmon->Diem,
            'Kynang'=>$Kynang->Diem,
            'Kienthuc'=>$Kienthuc->Diem,
            'Congdong'=>$Congdong->Diem,
            'Thechat'=>$Thechat->Diem
        ]);
    }
}
