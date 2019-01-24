<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile\StaffModel;
use App\Profile\HistoryModel;
use App\Profile\DiemDanhModel;
use App\Profile\BangChoDuyetModel;
use App\Profile\DIEMDANHHOATDONGmodel;
use App\Profile\HOATDONGNOIBOmodel;
use App\Http\Controllers\SQL\ProfileManager;
use Excel;
use Carbon\Carbon;
use PHPExcel_Worksheet_Drawing;
use App\Http\Controllers\StoreProcedureProfile\StoreThamNien;

class ProfileController extends Controller
{	
     public function formCongHien(){
        $detailCH = \DB::table('History')->get();
        return view('Admin.AdminControl.DiemCongHien')->with(['detailCH'=>$detailCH]);
    }
	public function Information(){

		return view('Profile.index');
	}
    public function getInfo(Request $Request){
    	
    	$data= StaffModel::where('Id_Card',$Request->idcard)->orWhere('Staff_ID',$Request->idcard)->get()->first();
    	$diemdanh = \DB::select(\DB::raw("SELECT STAFF.Staff_ID, Full_name , Sum(Hours) as point from STAFF,Diemdanh where STAFF.Staff_ID=N'$data->Staff_ID' and STAFF.Staff_ID = 
Diemdanh.Staff_ID group by STAFF.Staff_ID,Full_name"));

    	return view('Profile.profile')->with(['data'=>$data,'diemdanh'=>$diemdanh]);
    }

    public function ImportFile(Request $Request){
    	\Excel::load($Request->file,function($reader){
    		$data = $reader->get(array('id','ho_va_ten','dob','ngay_vao_lam','ngay_nghi_viec','cong_ty','tinh_trang','birthplace','current_address','phong_ban'));
    		
    		foreach($data as $key){
    			if($key->tinh_trang == 'Đã nghỉ việc'){
    				$status = 0;
    			}
    			else{
    				$status = 1;
    			}
    				$nhap = new StaffModel;
    				$nhap->Staff_ID = $key->id;
    				$nhap->Full_name = $key->ho_va_ten;
    				$nhap->DOB = $key->dob;
    				$nhap->Start_work = $key->ngay_vao_lam;
    				$nhap->End_work = $key->ngay_nghi_viec;
    				$nhap->Company = $key->cong_ty;
    				$nhap->Status_WK = $status;
    				$nhap->Birthplace = $key->birthplace;
    				$nhap->Current_Address = $key->current_address;
                    $nhap->Department = $key->phong_ban;
    				$nhap->save();
    		}

    	});

    	return back();
    }

public function Tesst(){
     // ProfileController::AutoUpdate();
        $data = \DB::table('STAFF')->where('Status_WK',1)->get();
       
        foreach($data as $key){
           	ProfileController::StartWork($key->Staff_ID,$key->Start_work);
        // ProfileController::Conghien($key->Start_work,$key->Staff_ID);
         
            // ProfileController::ConghienNghi($key->Start_work,$key->Staff_ID,$key->End_work);
            // ProfileController::AutoUpdateContributepoint();
            //    ProfileController::Tinhdiem($key->Staff_ID);
        }
    }
    public function Conghien($Ngay,$STAFFID){
       

          date_default_timezone_set("Asia/Ho_Chi_Minh");
        $Start_work = explode('-', $Ngay);
        $Start_work2 = explode(' ',$Start_work[2]);  
        $ngaybatdau = Carbon::create($Start_work[0],$Start_work[1],$Start_work2[0],0,0,0,'Asia/Ho_Chi_Minh');
        if($ngaybatdau <= Carbon::create(2016,8,1,0,0,0,'Asia/Ho_Chi_Minh'))
        {
            $ngaybatdau = Carbon::create(2016,8,1,0,0,0,'Asia/Ho_Chi_Minh');
        }


        $CurrentTime = today();

        // dd(($ngaybatdau->day >= $CurrentTime->day) && ($ngaybatdau->year <= $CurrentTime->year));
        $i = null;
           $z = 0;
        do{
            $ngaybatdau->modify('+1 month');
            
                if($ngaybatdau <= $CurrentTime){
                    $find = \DB::table('History')->where(['Staff_ID'=>$STAFFID])->orderBy('Decision_Date','DESC')->get()->first();
                    $Closing_Balance = $find->Closing_Balance;
                 
                    $his = new HistoryModel;
                    $his->Staff_ID = $STAFFID;
                    $his->Opening_Balance = $find->Closing_Balance;
                    $his->Increase_Decrease = 100;
                    $his->Closing_Balance = ++$z*100;
                    $his->Reason = 1;
                    $his->Decision_Date = $ngaybatdau;
                    $his->Decision_Number = '0';
                    $his->save();
                }

            
            
        }
        
        while($ngaybatdau <= $CurrentTime);
        
        }
        // Contribute_point
        public function Tinhdiem($Staff_ID){
                $find = HistoryModel::where('Staff_ID',$Staff_ID)->orderBy('created_at','DESC')->get()->first();
                \DB::table('STAFF')->where('Staff_ID',$Staff_ID)->update(['Contribute_point'=>$find->Closing_Balance]);
        }
        // StartWork
        public function StartWork($STAFF,$ngaybatdau){
            $his = new HistoryModel;
            $his->Staff_ID = $STAFF;
            $his->Opening_Balance = 0 ;
            $his->Increase_Decrease = 0;
            $his->Closing_Balance = 0;
            $his->Reason = 0;
            $his->Decision_Date = $ngaybatdau;
            $his->Decision_Number = '0';
            $his->save();

        }
        public function ConghienNghi($Ngay,$STAFFID,$Nghi){
date_default_timezone_set("Asia/Ho_Chi_Minh");
        $Start_work = explode('-', $Ngay);
        $Start_work2 = explode(' ',$Start_work[2]);  
        $ngaybatdau = Carbon::create($Start_work[0],$Start_work[1],$Start_work2[0],0,0,0,'Asia/Ho_Chi_Minh');
        // Endwork 
        $End_work = explode('-', $Nghi);
        $End_work2 = explode(' ',$End_work[2]);  
        $ketthuc = Carbon::create($End_work[0],$End_work[1],$End_work2[0],0,0,0,'Asia/Ho_Chi_Minh');
        // 1/10/2018

        $CurrentTime = today();

        // dd(($ngaybatdau->day >= $CurrentTime->day) && ($ngaybatdau->year <= $CurrentTime->year));
        $i = null;
        do{
            $ngaybatdau->modify('+1 month');
            
                if($ngaybatdau <= $ketthuc){
                    $find = \DB::table('History')->where(['Staff_ID'=>$STAFFID])->orderBy('Decision_Date','DESC')->get()->first();
                    $his = new HistoryModel;
                    $his->Staff_ID = $STAFFID;
                    $his->Opening_Balance = $find->Closing_Balance;
                    $his->Increase_Decrease = 1;
                    $his->Closing_Balance = ++$find->Closing_Balance;
                    $his->Reason = 1;
                    $his->Decision_Date = $ngaybatdau;
                    $his->Decision_Number = '0';
                    $his->save();
                }

            
            
        }
        
        while($ngaybatdau <= $ketthuc);

        }
        public function AutoUpdateContributepoint(){
            $find= \DB::table('STAFF')->where('Status_WK',1)->get();
            foreach ($find as $key) {
               $find2 = \DB::table('History')->where('Staff_ID',$key->Staff_ID)->orderBy('created_at','DESC')->get()->first();
              ProfileController::Conghien($find2->Decision_Date,$key->Staff_ID);

            }
            // foreach ($find as $key1) {
            //    ProfileController::Tinhdiem($key1->Staff_ID);
            // }

        }
// Admin_Manager
        public function getInfoAdmin(){
             ProfileManager::update_CongHien();
            $data = StaffModel::where('Status_WK',1)->join('Contribute_point','STAFF.Staff_ID','=','Contribute_point.Staff_ID')
            ->select('STAFF.Staff_ID','STAFF.Full_name','STAFF.Company','STAFF.Start_work','Contribute_point.Total_point')
            ->get();
          
            return view('Profile.profileadmin')->with(['data'=>$data]);
        }

        public function getHistoryDetail(Request $Request){

            $data = \DB::table("History")->where('History.Staff_ID',$Request->Staff_ID)->join('STAFF','History.Staff_ID','=','STAFF.Staff_ID')->Select('STAFF.Full_name','History.created_at','History.Opening_Balance','Closing_Balance')->orderBy('created_at','Desc')->get()->first();
                        return array($data);
        }
        public function postDiemCongHien(Request $Request){
            $Full_name = $Request->Fullname;
            $Staff_ID = $Request->Staff_ID ;
            $Opening_Balance = $Request->Opening_Balance;
            $Increase_Decrease = $Request->Increase_Decrease;
            $Reason = $Request->Reason;
            $Decision_Number = $Request->Decision_Number;
            $Decision_Date = $Request->Decision_Date;

            $nhap = new HistoryModel;
            $nhap->Staff_ID = $Staff_ID;
            $nhap->Opening_Balance = $Opening_Balance;
            $nhap->Closing_Balance = $Opening_Balance + $Increase_Decrease;
            $nhap->Increase_Decrease = $Increase_Decrease;
            $nhap->Reason = $Reason;
            $nhap->Decision_Number = $Decision_Number;
            $nhap->Decision_Date = $Decision_Date;
            $nhap->save();
            ProfileController::Tinhdiem($Staff_ID);

            return back();
        }
        public function ImportFileDiemDanh(Request $Request){
           






            Excel::load($Request->file, function($reader){
                $data = $reader->get(array('id','event_name','hours','f'));

                foreach ($data as $key ) {
                    $check = \DB::table('STAFF')->where('Staff_ID',$key->id)->get()->first();
                  if((!empty($check)))
                  {
                    
                    $array = explode('-',$key->event_name);
                    $value  = $array[0];
                    $exportNgay = explode('.',$value);
                    $Event_Date = Carbon::createFromDate($exportNgay[2],$exportNgay[1],$exportNgay[0],'Asia/Ho_Chi_Minh');
                    $Categories = $array[1];
                    $Event_Name = $array[2];
                    $nhap = new DiemDanhModel;
                    $nhap->Staff_ID = $key->id;
                    $nhap->Event_Name = $Event_Name;
                    $nhap->Categories = $Categories;
                    $nhap->Event_Date = $Event_Date;
                    $nhap->Hours = $key->hours;
                    if($key->f == null)
                        $nhap->created_at = $Event_Date;
                    else
                        $nhap->created_at = $key->f;
                    $nhap->save();
                    }
                }
            });

        }

// client 
        public function getHistory(Request $Request){
            $data = \DB::table('History')->where('Staff_ID',$Request->Staff_ID)->get();
            return view('Profile.getHistory',compact('data'));

        }
        public function getHistoryDiemdanh(Request $Request){
            $data = \DB::table('Diemdanh')->where('Staff_ID',$Request->Staff_ID)->get();
            return view('Profile.getHistoryDiemdanh',compact('data'));

        }


        //  Function auto
        public function AutoUpdate(){
            $find = \DB::table('STAFF')->where("Status_WK",1)->get();
            foreach ($find as $key ) {
                $lastupdate = \DB::table('History')->where('Staff_ID',$key->Staff_ID)->orderBy('Decision_Date','DESC')->get()->first();
                $lastPoint = \DB::table('History')->where('Staff_ID',$key->Staff_ID)->orderBy('created_at','DESC')->get()->first();
                $Opening_Balance = $lastPoint->Closing_Balance; 
                date_default_timezone_set("Asia/Ho_Chi_Minh");
        $Start_work = explode('-', $lastupdate->Decision_Date);
        $Start_work2 = explode(' ',$Start_work[2]);  
        $ngaybatdau = Carbon::create($Start_work[0],$Start_work[1],$Start_work2[0],0,0,0,'Asia/Ho_Chi_Minh');
         $CurrentTime = today();
               do{
            $ngaybatdau->modify('+1 month');
            
                if($ngaybatdau <= $CurrentTime){          
                    $his = new HistoryModel;
                    $his->Staff_ID = $key->Staff_ID;
                    $his->Opening_Balance = $Opening_Balance;
                    $his->Increase_Decrease = 100;
                    $his->Closing_Balance = $Opening_Balance + 100;
                    $his->Reason = 1;
                    $his->Decision_Date = $ngaybatdau;
                    $his->Decision_Number = '0';
                    $his->save();
                }

            
            
        }
        
        while($ngaybatdau <= $CurrentTime);
        ProfileController::Tinhdiem($key->Staff_ID);
            }
        }

        // Giờ đào tạo

        public function getDiemDanh(){
             $detailDD =DIEMDANHHOATDONGmodel::join('STAFF','DIEMDANHHOATDONG.Staff_ID','=','STAFF.Staff_ID')
                    ->join('HOATDONGNOIBO','HOATDONGNOIBO.Mahoatdong','=','DIEMDANHHOATDONG.Mahoatdong')
                    ->select('DIEMDANHHOATDONG.*','STAFF.Full_name','HOATDONGNOIBO.Tenhoatdong')
                    ->get();
            return view('Admin.AdminControl.GioDaoTao')->with(['detailDD'=>$detailDD]);
        }
        public function getDiemDanh_Ten(Request $Request){
            $Ten = $Request->Ten;
            $getTen = StaffModel::where('Full_name','like','%'.$Ten.'%')->SELECT('Full_name')->get();
            return $getTen;
        }
        public function getSuccessTen(Request $Request){
            $Ten = $Request->Ten;
            $detaiTen = StaffModel::where('Full_name',$Ten)->get()->first();
            
            return $detaiTen;
        }

        public function postDiemDanh(Request $Request){
           // valiable
            $Staff_ID = $Request->Staff_ID;
            $Event_Name = $Request->Event_Name;
            $Mahoatdong = $Request->Mahoatdong;
            $Event_Date = $Request->Event_Date;
            $TL = $Request->TL;
            $KT = $Request->KT;
            $KN = $Request->KN;
            $CM = $Request->CM;
            $CD = $Request->CD;
            $TC = $Request->TC;
            // Function 
            $nhap = new DIEMDANHHOATDONGmodel;
            $nhap->Staff_ID = $Staff_ID;
            $nhap->Mahoatdong = $Mahoatdong;
            $nhap->Ngayhoatdong = $Event_Date;
            $nhap->TL = $TL;
            $nhap->KT = $KT;
            $nhap->KN = $KN;
            $nhap->CM = $CM;
            $nhap->CD = $CD;
            $nhap->TC = $TC;
            $nhap->save();
          
           ProfileManager::trigger_Insert_ThongKeCongHien_GioDaoTao($Staff_ID,$Event_Date,$Mahoatdong);
              return 'Nhập thành công';
        }

        public function getDataDiemDanh(Request $Request){
            $data = \DB::table('STAFF')->where('Staff_ID',$Request->Staff_ID)->get();
        return $data;
        }
        private function checkStaff_ID($file){
            Excel::load($file,function($reader){
                $scan = $reader->get(array('id','event_name','f'));
                foreach($scan as $key){
                    $array = explode('-',$key->event_name);
            
                     $event  = $array[2];
                   
                  $value  = $array[0];
                     $exportNgay = explode('.',$value);
                     $Event_Date = Carbon::createFromDate($exportNgay[2],$exportNgay[1],$exportNgay[0],'Asia/Ho_Chi_Minh');
                    $check = DiemDanhModel::where('Staff_ID',$key->id)->where('Event_Name',$event)
                    ->where('Event_Date',$Event_Date)
                    ->get()->first();

                  
                    if(empty($check)){
                       
                        echo $key->id.'/'.$key->event_name.'/'.$key->f.'<br>';
                    }
                    
                   
                }
            });
        }
        public function pMahoatdong(Request $Request){
            $Mahoatdong = $Request->Mahoatdong;
            $data = HOATDONGNOIBOmodel::where('Mahoatdong',$Mahoatdong)->get()->first();

            return $data;

        }
        public function pMahoatdong_Ten(Request $Request){
             $Ten = $Request->Event_Name;
             $compare = '%'.$Ten.'%';
            $data = HOATDONGNOIBOmodel::where('Tenhoatdong','like',$compare)->SELECT('Tenhoatdong')->get();

            return $data;
        }
        public function SuccesMahoatdong(Request $Request){
            $Ten = $Request->Ten;
            $data = HOATDONGNOIBOmodel::where('Tenhoatdong',$Ten)->get()->first();
            return $data;
        }
}
