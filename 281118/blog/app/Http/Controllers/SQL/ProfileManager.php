<?php

namespace App\Http\Controllers\SQL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile\ThongKeDiemCongHienModel;
use App\Profile\HOATDONGNOIBOmodel;
use App\Profile\DIEMDANHHOATDONGmodel;
use App\Profile\StaffModel;
use Carbon\Carbon;
use App\Profile\Contribute_point;

class ProfileManager extends Controller
{
   	public static function trigger_Insert_ThongKeCongHien_GioDaoTao($Staff_ID , $NgayHoatDong, $Mahoatdong){
   		$getValue = DIEMDANHHOATDONGmodel::where(['Staff_ID'=>$Staff_ID,'Mahoatdong'=>$Mahoatdong,'Ngayhoatdong'=>$NgayHoatDong])
   		->select('Staff_ID','Totalpoint','id')->orderBy('id','DESC')->get()->first();
   		$lastValue = ThongKeDiemCongHienModel::where("Staff_ID",$Staff_ID)->select("Closing_Balance",'ThamNien','NgayTangThamNien')->orderBy('id','DESC')->get()->first();
   		// Thống kê 
   		$Opening_Balance = $lastValue->Closing_Balance;
   		$ThamNien = $lastValue->ThamNien;
   		$NgayTangThamNien = $lastValue->NgayTangThamNien;
   		$GioDaoTao = $getValue->Totalpoint;
   		$Closing_Balance = $Opening_Balance + $GioDaoTao;
   		$id_HoatDong = $getValue->id;

   		// Insert 
   		$insert = new ThongKeDiemCongHienModel;
   		$insert->Staff_ID = $Staff_ID;
   		$insert->NgayTangThamNien = $NgayTangThamNien;
   		$insert->Opening_Balance = $Opening_Balance;
   		$insert->ThamNien = $ThamNien;
   		$insert->GioDaoTao = $GioDaoTao;
   		$insert->Closing_Balance = $Closing_Balance;
   		$insert->Ngayhoatdong = $NgayHoatDong;
   		$insert->id_HoatDong = $id_HoatDong;
   		$insert->save();
   	}
   	public static function Update_EditInDay($id){
   		// Tìm id giá trị được thay đổi
   		$check = ThongKeDiemCongHienModel::where('id_HoatDong',$id)->select('Staff_ID','id','id_HoatDong')->get()->first();
   		$id_Checked = $check->id;
   		$Staff_ID = $check->Staff_ID;
   		// Bước 2: Xóa các record được import sau đó
   		ThongKeDiemCongHienModel::where('Staff_ID',$Staff_ID)->where('id','>=',$id_Checked)->delete();
   		// Lấy các giá trị của Staff_ID đã được insert 
   		$all_value_inserted = DIEMDANHHOATDONGmodel::where('Staff_ID',$Staff_ID)->where('id','>=',$id)->get();
   		foreach ($all_value_inserted as $key) {
         ProfileManager::store_ThongKeCongHien_ThamNien($key->Staff_ID);
   			ProfileManager::trigger_Insert_ThongKeCongHien_GioDaoTao($key->Staff_ID,$key->Ngayhoatdong,$key->Mahoatdong);
       
   		}
   	}

   	public static function store_ThongKeCongHien_ThamNien($StaffID=null){
          if(empty($StaffID))
            $Staff_ID = StaffModel::get();
          else
             $Staff_ID = StaffModel::where('Staff_ID',$StaffID)->get();
            foreach ($Staff_ID as $key){
               if(ThongKeDiemCongHienModel::find($key->Staff_ID)){
                  $getValue = ThongKeDiemCongHienModel::where('Staff_ID',$key->Staff_ID)->orderBy('id','DESC')->get()->first();
                  ProfileManager::insert_ThongKeCongHien_TinhThamNien($getValue->Staff_ID,$getValue->NgayTangThamNien,$key->End_work);
               }
               else{
                  echo $key->Staff_ID;
               }
            }
   	}
   public static function insert_ThongKeCongHien_TinhThamNien($Staff_ID,$Start_work,$End_work = null){
      date_default_timezone_set("Asia/Ho_Chi_Minh");
      $ngaybatdau =  Carbon::createFromFormat('Y-m-d',$Start_work);
      if($ngaybatdau <= Carbon::create(2016,8,1,0,0,0,'Asia/Ho_Chi_Minh'))
        {
               $ngaybatdau = Carbon::create(2016,8,1,0,0,0,'Asia/Ho_Chi_Minh');
        }
      if($End_work == null)
               $CurrentTime = today();
      else
               $CurrentTime = Carbon::createFromFormat('Y-m-d',$End_work);

      do{
            $ngaybatdau->modify('+1 month'); 

            $find = ThongKeDiemCongHienModel::where('Staff_ID',$Staff_ID)->orderBy('id','DESC')->get()->first();  

              if($ngaybatdau <= $CurrentTime){
                    $Closing_Balance = $find->Closing_Balance;
                    // History   
                    $his = new ThongKeDiemCongHienModel;
                    $his->Staff_ID = $Staff_ID;
                    $his->Opening_Balance = $Closing_Balance;
                    $his->Closing_Balance = $find->ThamNien + 100 + ($Closing_Balance - $find->ThamNien) ;
                    $his->ThamNien = $find->ThamNien + 100;
                    $his->NgayTangThamNien = $ngaybatdau;
                    $his->save();         
                    }
        }

        while($ngaybatdau <= $CurrentTime);

      }
      public function TinhThamNien($Staff_ID,$Start_work,$End_work = null){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
   $ngaybatdau =  Carbon::createFromFormat('Y-m-d',$Start_work);
   if($ngaybatdau <= Carbon::create(2016,8,1,0,0,0,'Asia/Ho_Chi_Minh'))
        {
            $ngaybatdau = Carbon::create(2016,8,1,0,0,0,'Asia/Ho_Chi_Minh');
        }
        if($End_work == null)
        $CurrentTime = today();
        else
            $CurrentTime = Carbon::createFromFormat('Y-m-d',$End_work);

     do{
            $ngaybatdau->modify('+1 month'); 

            $find = ThongKeDiemCongHienModel::where('Staff_ID',$Staff_ID)->orderBy('id','DESC')->get()->first();  

              if($ngaybatdau <= $CurrentTime){
                    $Closing_Balance = $find->Closing_Balance;
                    // History 
                      $check = \DB::table('DIEMDANHHOATDONG')->where('Staff_ID',$Staff_ID)
                      ->where('Ngayhoatdong','<', $ngaybatdau)
                      ->where('Ngayhoatdong' ,'>=', $find->NgayTangThamNien)
                        ->orderBy('Ngayhoatdong','DESC')
                      ->get();            
                    $his = new ThongKeDiemCongHienModel;
                    $his->Staff_ID = $Staff_ID;
                    $his->Opening_Balance = $Closing_Balance;
                    $his->Closing_Balance = $find->ThamNien + 100 + ($Closing_Balance - $find->ThamNien) ;
                    $his->ThamNien = $find->ThamNien + 100;
                    $his->NgayTangThamNien = $ngaybatdau;
                    $his->save();         
                    if($check->isNotEmpty()){
                    foreach ($check as $key) {
                           
            $find = ThongKeDiemCongHienModel::where('Staff_ID',$Staff_ID)->orderBy('id','DESC')->get()->first();                       
                      $his = new ThongKeDiemCongHienModel;
                        $his->Staff_ID = $Staff_ID;
                        $his->Opening_Balance = $find->Closing_Balance;
                        $his->Closing_Balance = $find->Closing_Balance + $key->Totoalpoint ;
                        $his->NgayHoatDong = $key->Ngayhoatdong;
                        $his->ThamNien = $find->ThamNien;
                        $his->GioDaoTao = $key->Totoalpoint;
                        $his->NgayTangThamNien = $ngaybatdau;
                        $his->save();  

                              
                              }
                         
                         }          
                    }
                else{                  
                    $find = ThongKeDiemCongHienModel::where('Staff_ID',$Staff_ID)->orderBy('id','DESC')->get()->first();                  
                    $check = \DB::table('DIEMDANHHOATDONG')->where('Staff_ID',$Staff_ID)->where('Ngayhoatdong','>=', $find->NgayTangThamNien)
                        ->where('Ngayhoatdong','<=',$CurrentTime)->get();
                         if($check->isNotEmpty()){
                        foreach ($check as $key) {                      
                            $find = ThongKeDiemCongHienModel::where('Staff_ID',$Staff_ID)->orderBy('id','DESC')->get()->first();     
                            $his = new ThongKeDiemCongHienModel;
                            $his->Staff_ID = $Staff_ID;
                            $his->Opening_Balance = $find->Closing_Balance;
                            $his->Closing_Balance = $find->Closing_Balance + $key->Totoalpoint ;
                            $his->NgayHoatDong = $key->Ngayhoatdong;
                            $his->ThamNien = $find->ThamNien;
                            $his->GioDaoTao = $key->Totoalpoint;
                            $his->NgayTangThamNien = $find->NgayTangThamNien;
                            $his->save();           
                   }              
               }
           }
        }

        while($ngaybatdau <= $CurrentTime);
  }
    public static function update_CongHien(){
      $Staff_ID = Contribute_point::select('Staff_ID')->get();
      foreach ($Staff_ID as $key) {
              $CongHien = ThongKeDiemCongHienModel::select('id','Closing_Balance','ThamNien')->where('Staff_ID',$key->Staff_ID)->orderBy('id','DESC')->get()->first();
         
                $update = Contribute_point::find($key->Staff_ID);
                $update->Total_point = $CongHien->Closing_Balance;
                $update->Tham_nien = $CongHien->ThamNien;
                $update->save();
              

      }
    }
}
