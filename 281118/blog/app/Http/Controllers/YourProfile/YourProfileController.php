<?php

namespace App\Http\Controllers\YourProfile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use App\Profile\BangChoDuyetModel;
use App\Profile\Contribute_point;
use App\Profile\HOATDONGNOIBOmodel;
use App\Profile\DIEMDANHHOATDONGmodel;

class YourProfileController extends Controller
{
    public function getYouProfile()
    {		
        $updatetimeCH = \DB::table('History')->where('Staff_ID',Auth::user()->Manv)
            ->orderBy('updated_at','ASC')->get()->first();
        $updatetimeDT = DIEMDANHHOATDONGmodel::where('Staff_ID',Auth::user()->Manv)
            ->orderBy('updated_at','ASC')->get()->first();
    	$Conghien = DIEMDANHHOATDONGmodel::join('STAFF','DIEMDANHHOATDONG.Staff_ID','=','STAFF.Staff_ID')
                    ->join('HOATDONGNOIBO','HOATDONGNOIBO.Mahoatdong','=','DIEMDANHHOATDONG.Mahoatdong')
                    ->select('DIEMDANHHOATDONG.*','STAFF.Full_name','HOATDONGNOIBO.Tenhoatdong')
                    ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])
                    ->get();

        $Tamly = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw(' STAFF.Staff_ID,Full_name,Sum(TL) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();
        
        $Chuyenmon = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw('STAFF.Staff_ID,Full_name,Sum(CM) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();
        
        $Kynang = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw('STAFF.Staff_ID,Full_name,Sum(KN) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();

        $Kienthuc = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw(' STAFF.Staff_ID,Full_name,Sum(KT) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();

        $Congdong = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw(' STAFF.Staff_ID,Full_name,Sum(CD) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();

        $Thechat = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw(' STAFF.Staff_ID,Full_name,Sum(TC) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();
       
    	return view('YourProfile.index')->with(['Conghien'=>$Conghien,
            'Tamly'=>$Tamly,
            'Chuyenmon'=>$Chuyenmon,
            'Kynang'=>$Kynang,
            'Kienthuc'=>$Kienthuc,
            'Congdong'=>$Congdong,
            'Thechat'=>$Thechat,
            'updatetimeCH'=>$updatetimeCH,
            'updatetimeDT'=>$updatetimeDT
        ]);
    }
    public function ChartCH(){
        $user = Auth::user()->Manv;
            $data = \DB::select(\DB::raw("
                select TOP 12 ThamNien,SUM(GioDaoTao) as H , Month(NgayTangThamNien) as T ,Year(NgayTangThamNien) as N
from ThongKeDiemCongHien 
where Staff_ID = '$user' 
and Month(NgayTangThamNien)  in(select Month(NgayTangThamNien) from ThongKeDiemCongHien
                                    where YEAR(NgayTangThamNien) >= 2016
                                    group by  Month(NgayTangThamNien),YEAR(NgayTangThamNien)
                                )
and Year(NgayTangThamNien) in (
                                select  YEAR(NgayTangThamNien) as N'Năm' from ThongKeDiemCongHien
                                    where YEAR(NgayTangThamNien) >= 2016
                                    group by  Month(NgayTangThamNien),YEAR(NgayTangThamNien)
                                    
)
and  Year(NgayTangThamNien) >= 2018
group by ThamNien,Month(NgayTangThamNien),Year(NgayTangThamNien)
order by Year(NgayTangThamNien),Month(NgayTangThamNien) ASC

                "));
    		return $data;
    }
    public function Chartpage(){
    	return view('YourProfile.charts');
    }
    public function ChartDaoTao(){
         $Tamly = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw(' STAFF.Staff_ID,Full_name,Sum(TL) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();
        
        $Chuyenmon = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw('STAFF.Staff_ID,Full_name,Sum(CM) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();
        
        $Kynang = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw('STAFF.Staff_ID,Full_name,Sum(KN) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();

        $Kienthuc = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw(' STAFF.Staff_ID,Full_name,Sum(KT) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();

        $Congdong = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw(' STAFF.Staff_ID,Full_name,Sum(CD) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();

        $Thechat = DIEMDANHHOATDONGmodel::join('STAFF','STAFF.Staff_ID','=','DIEMDANHHOATDONG.Staff_ID')
        ->select(\DB::raw(' STAFF.Staff_ID,Full_name,Sum(TC) as Diem'))
        ->where(['STAFF.Staff_ID'=>Auth::user()->Manv])->groupBy('STAFF.Staff_ID','Full_name')->get()->first();
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
