<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\EventModel;
Use App\EventModelH;
Use App\EventModelVDZEN;
Use App\EventModelVDNons1;
Use App\EventModelVDNons2;
Use App\EventModelVDHT;
Use App\EventModelVDSHGT;
Use App\EventModelVDSBong;
Use App\EventModelVDKid;
Use App\EventModelVDYoga;
Use App\EventModelVDBep;
Use App\EventModelVDMinigym;
Use App\EventModelHVDT;
Use App\EventModelHVH;
Use App\EventModelHVTV1;
Use App\EventModelHVTV2;
Use App\EventModelHVTV3;

class TongViecController extends Controller
{
    public function tongviec(){
    	$phongkai = EventModel::where('end','>=',now())->get();
    	$phonghop = EventModelH::where('end','>=',now())->get();
    	$phongzen = EventModelVDZEN::where('end','>=',now())->get();
    	$phongnons1 = EventModelVDNons1::where('end','>=',now())->get();
    	$phongnons2 = EventModelVDNons2::where('end','>=',now())->get();
    	$phongHT = EventModelVDHT::where('end','>=',now())->get();
    	$phongSHGT = EventModelVDSHGT::where('end','>=',now())->get();
    	$SBong = EventModelVDSBong::where('end','>=',now())->get();
    	$phongKid = EventModelVDKid::where('end','>=',now())->get();
    	$phongYoga = EventModelVDYoga::where('end','>=',now())->get();
    	$phongBep = EventModelVDBep::where('end','>=',now())->get();
    	$phongMinigym = EventModelVDMinigym::where('end','>=',now())->get();
// Honviet
    	$phongdt = EventModelHVDT::where('end','>=',now())->get();
    	$phonghophv = EventModelHVH::where('end','>=',now())->get();
    	$phongtv1 = EventModelHVTV1::where('end','>=',now())->get();
    	$phongtv2 = EventModelHVTV2::where('end','>=',now())->get();
    	$phongtv3 = EventModelHVTV3::where('end','>=',now())->get();
    	return view('datlich.tongviec')->with('phonghop',$phonghop)->with('phongkai',$phongkai)->with('phongzen',$phongzen)->with('phongnons1',$phongnons1)->with('phongnons2',$phongnons2)->with('phongHT',$phongHT)->with('phongSHGT',$phongSHGT)->with('phongKid',$phongKid)->with('phongYoga',$phongYoga)->with('phongMinigym',$phongMinigym)->with('phongBep',$phongBep)->with('SBong',$SBong)->with('phongdt',$phongdt)->with('phonghophv',$phonghophv)->with('phongtv1',$phongtv1)->with('phongtv2',$phongtv2)->with('phongtv3',$phongtv3);
    }
     public function tongviechv(){
        $phongkai = EventModel::get();
        $phonghop = EventModelH::get();
        $phongzen = EventModelVDZEN::get();
        $phongnons1 = EventModelVDNons1::get();
        $phongnons2 = EventModelVDNons2::get();
        $phongHT = EventModelVDHT::get();
        $phongSHGT = EventModelVDSHGT::get();
        $SBong = EventModelVDSBong::get();
        $phongKid = EventModelVDKid::get();
        $phongYoga = EventModelVDYoga::get();
        $phongBep = EventModelVDBep::get();
        $phongMinigym = EventModelVDMinigym::get();
// Honviet
        $phongdt = EventModelHVDT::get();
        $phonghophv = EventModelHVH::get();
        $phongtv1 = EventModelHVTV1::get();
        $phongtv2 = EventModelHVTV2::get();
        $phongtv3 = EventModelHVTV3::get();
        return view('datlich.honviet.tongviechv')->with('phonghop',$phonghop)->with('phongkai',$phongkai)->with('phongzen',$phongzen)->with('phongnons1',$phongnons1)->with('phongnons2',$phongnons2)->with('phongHT',$phongHT)->with('phongSHGT',$phongSHGT)->with('phongKid',$phongKid)->with('phongYoga',$phongYoga)->with('phongMinigym',$phongMinigym)->with('phongBep',$phongBep)->with('SBong',$SBong)->with('phongdt',$phongdt)->with('phonghophv',$phonghophv)->with('phongtv1',$phongtv1)->with('phongtv2',$phongtv2)->with('phongtv3',$phongtv3);
    }
}
