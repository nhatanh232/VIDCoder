<?php

namespace App\Http\Controllers\StoreProcedureProfile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile\DiemDanhModel;
use App\Profile\HistoryModel;
use App\Profile\StaffModel;
use App\Profile\DiemCongHienModel;
use App\Profile\Contribute_point;
use App\Profile\BangChoDuyetModel;
use Carbon\Carbon;
use Excel;
class StoreThamNien extends Controller
{
    Public static function Store_main_total(){
        StoreThamNienTotal::Contribute_point();
    }
    public static function Store_main(){
        $data = \DB::table('STAFF')->where('Status_WK',1)->get();
        foreach ($data as $key){
            $kiemtra = \DB::table('History')->where('Staff_ID',$key->Staff_ID)->get();
        
            if($kiemtra->isEmpty()){
                    
                StoreThamNien::StartWork($key->Staff_ID,$key->Start_work);
                
            }
        $check = \DB::table('History')->where('Staff_ID',$key->Staff_ID)->orderBy('Decision_Date','DESC')->get()->first();
            StoreThamNien::Store_ThamNien($check->Decision_Date,$check->Staff_ID);
            // StoreThamNien::ConghienNghi($key->Start_work,$key->Staff_ID , $key->End_work);

        }
        // CỐng hiến nghỉ
        $data1 = \DB::table('STAFF')->where('Status_WK',0)->get();
        foreach ($data1 as $key){
            $kiemtra1 = \DB::table('History')->where('Staff_ID',$key->Staff_ID)->get();
        
            if($kiemtra1->isEmpty()){
                    
                StoreThamNien::StartWork($key->Staff_ID,$key->Start_work);
                
            }
        
            if(!empty($key->End_work))
            StoreThamNien::ConghienNghi($key->Start_work,$key->Staff_ID , $key->End_work);

        }
        StoreThamNien::UpdateContribute();
        return back();
    }
    public static function Store_ThamNien($Ngay,$STAFFID){
         date_default_timezone_set("Asia/Ho_Chi_Minh");
        $Start_work = explode('-', $Ngay);
        $Start_work2 = explode(' ',$Start_work[2]);  
        $ngaybatdau = Carbon::create($Start_work[0],$Start_work[1],$Start_work2[0],0,0,0,'Asia/Ho_Chi_Minh');
        if($ngaybatdau <= Carbon::create(2016,8,1,0,0,0,'Asia/Ho_Chi_Minh'))
        {
            $ngaybatdau = Carbon::create(2016,8,1,0,0,0,'Asia/Ho_Chi_Minh');
        }


        $CurrentTime = today();

        do{
            $ngaybatdau->modify('+1 month');
            
                if($ngaybatdau <= $CurrentTime){
                    $find = \DB::table('History')->where(['Staff_ID'=>$STAFFID])->orderBy('Decision_Date','DESC')->get()->first();
                    $Closing_Balance = $find->Closing_Balance;
                 
                    $his = new HistoryModel;
                    $his->Staff_ID = $STAFFID;
                    $his->Opening_Balance = $Closing_Balance;
                    $his->Increase_Decrease = 100;
                    $his->Closing_Balance = $Closing_Balance + 100;
                    $his->Reason = 1;
                    $his->Decision_Date = $ngaybatdau;
                    $his->Decision_Number = '0';
                    $his->save();
                }

            
            
        }
        
        while($ngaybatdau <= $CurrentTime);
        
    }
     public static function StartWork($STAFF,$ngaybatdau){
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

       public static function ConghienNghi($Ngay,$STAFFID,$Nghi){
date_default_timezone_set("Asia/Ho_Chi_Minh");
        $Start_work = explode('-', $Ngay);
        $Start_work2 = explode(' ',$Start_work[2]);  
        $ngaybatdau = Carbon::create($Start_work[0],$Start_work[1],$Start_work2[0],0,0,0,'Asia/Ho_Chi_Minh');
        // Endwork 
        $End_work = explode('-', $Nghi);
        $End_work2 = explode(' ',$End_work[2]);  
        $ketthuc = Carbon::create($End_work[0],$End_work[1],$End_work2[0],0,0,0,'Asia/Ho_Chi_Minh');
        // 1/10/2018
        if($ngaybatdau <= Carbon::create(2016,8,1,0,0,0,'Asia/Ho_Chi_Minh'))
        {
            $ngaybatdau = Carbon::create(2016,8,1,0,0,0,'Asia/Ho_Chi_Minh');
        }
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
                    $his->Increase_Decrease = 100;
                    $his->Closing_Balance = $find->Closing_Balance + 100;
                    $his->Reason = 1;
                    $his->Decision_Date = $ngaybatdau;
                    $his->Decision_Number = '0';
                    $his->save();
                }

            
            
        }
        
        while($ngaybatdau <= $ketthuc);

        }

        // IMPORT DỮ LIỆU NHÂN VIÊN
        public static function Import_Amis_ICT(Request $Request){
            $file = $Request->file;

            if($Request->has('file_mau')){
                Excel::create('Form_Mau_Du_Lieu_Nhan_Vien',function($excel){
                    $excel->sheet('Hồ sơ nhân viên',function($sheet){
                        $sheet->row(1,array('Mã nhân viên', 'Họ và tên', 'Giới tính', 'Ngày sinh' ,'Nơi sinh' ,'Tôn giáo'    ,'Quốc tịch', 'Trình độ đào tạo', 'Mã vị trí công việc', 'Tên vị trí công việc', 'Bậc', 'Ngày thử việc dd-mm-YYYY'  ,'Ngày chính thức dd-mm-YYYY', 'Loại hợp đồng' ,  'Trạng thái lao động' ,'Ngày nghỉ việc' , 'Nhóm máu' ,'Mục tiêu cá nhân', 'Sở thích'));
                    });
                })->export('xlsx');
            }else{
            Excel::selectSheets(array('Hồ sơ nhân viên'))->load($file,function($reader){
                 
                 $CountStaff = 0;
                $data = $reader->get(array('ma_nhan_vien','ho_va_ten','gioi_tinh','ngay_sinh','noi_sinh','ton_giao','quoc_tich','trinh_do_dao_tao','cho_o_hien_nay','ngay_thu_viec','ngay_chinh_thuc','ngay_nghi_viec','trang_thai_lao_dong','ma_vi_tri_cong_viec','nhom_mau','muc_tieu_ca_nhan','so_thich','nguyen_quan','tinhthanh_pho_cua_nguyen_quan','tinh_trang_hon_nhan','trinh_do_dao_tao','tinh_trang_suc_khoe','diem_manh','diem_yeu','so_cong_chuan','don_vi_cham_cong','tham_gia_cong_doan','chieu_cao','can_nang',
                    'ho_va_ten_nguoi_lien_he_khan_cap','quan_he_nguoi_lien_he_khan_cap','dt_di_dong_nguoi_lien_he_khan_cap'
                    ,'noi_dao_tao','chuyen_nganh','email_co_quan','dt_di_dong'
                ));
                 $Status = array('Đang làm việc'=>'1','Nghỉ việc'=>'0',''=>'3');
                $GioiTinh = array('Nam'=> 0 , 'Nữ'=> 1);
                $CongDoan = array('Có'=>1 , "Không" => 0);
                foreach($data as $key){
                    $check = StaffModel::where('Staff_ID',$key->ma_nhan_vien)->get();
                  
                    if($check->isEmpty()){
                        if($Status[$key->trang_thai_lao_dong] == 1){
                            if($key->ngay_thu_viec != ""){
                                $nhap = new StaffModel;
                                $nhap->Staff_ID = $key->ma_nhan_vien;
                                $nhap->Full_name = $key->ho_va_ten;
                                $nhap->DOB = $key->ngay_sinh;
                                $nhap->Start_work = $key->ngay_thu_viec;
                                $nhap->Birthplace = $key->noi_sinh;
                                $nhap->Current_Address = $key->cho_o_hien_nay;
                               
                                $nhap->HoTen_KC = $key->ho_va_ten_nguoi_lien_he_khan_cap;
                                $nhap->QuanHe_KC = $key->quan_he_nguoi_lien_he_khan_cap;
                                $nhap->DT_KC = $key->dt_di_dong_nguoi_lien_he_khan_cap;
                             
                                $nhap->MaViTriCongViec = $key->ma_vi_tri_cong_viec;
                               
                                $nhap->SoThich = $key->so_thich;
                                $nhap->MucTieuCaNhan = $key->muc_tieu_ca_nhan;
                                $nhap->TinhTrangSucKhoe = $key->tinh_trang_suc_khoe;
                                $nhap->Status_WK = 1 ;
                                $nhap->GioiTinh = $GioiTinh[$key->gioi_tinh];
                                $nhap->DiemManh = $key->diem_manh;
                                $nhap->DiemYeu  = $key->diem_yeu;
                                $nhap->ChieuCao = $key->chieu_cao;
                                $nhap->CanNang = $key->can_nang;
                                $nhap->NhomMau = $key->nhom_mau;
                                $nhap->NguyenQuan  = $key->nguyen_quan;
                                $nhap->NguyenQuan_Tp = $key->tinhthanh_pho_cua_nguyen_quan;
                                $nhap->TinhTrangHonNhan = $key->tinh_trang_hon_nhan;
                                $nhap->TrinhDoDaoTao = $key->trinh_do_dao_tao;
                                $nhap->NoiDaoTao = $key->noi_dao_tao;
                                $nhap->ChuyenNganh = $key->chuyen_nganh;
                                $nhap->EmailCoQuan = $key->email_co_quan;
                                $nhap->DTDD = $key->dt_di_dong;


                                $nhap->SoCongChuan = $key->so_cong_chuan;
                                $nhap->DonViChamCong = $key->don_vi_cham_cong;
                                $nhap->ThamGiaCongDoan = $CongDoan[$key->tham_gia_cong_doan];
                                $nhap->save();
                            }

                            elseif ($key->ngay_chinh_thuc != "") {
                                $Start_work = $key->ngay_chinh_thuc->modify('-2 month');
                                    $nhap = new StaffModel;
                                    $nhap->Staff_ID = $key->ma_nhan_vien;
                                    $nhap->Full_name = $key->ho_va_ten;
                                    $nhap->DOB = $key->dob_mmddyyyy;
                                    $nhap->Start_work = $Start_work;
                                    $nhap->Birthplace = $key->noi_sinh;
                                    $nhap->Current_Address = $key->cho_o_hien_nay;
                                    
                                $nhap->HoTen_KC = $key->ho_va_ten_nguoi_lien_he_khan_cap;
                                $nhap->QuanHe_KC = $key->quan_he_nguoi_lien_he_khan_cap;
                                $nhap->DT_KC = $key->dt_di_dong_nguoi_lien_he_khan_cap;
                             
                                $nhap->MaViTriCongViec = $key->ma_vi_tri_cong_viec;
                               
                                $nhap->SoThich = $key->so_thich;
                                $nhap->MucTieuCaNhan = $key->muc_tieu_ca_nhan;
                                $nhap->TinhTrangSucKhoe = $key->tinh_trang_suc_khoe;
                                $nhap->Status_WK = 1 ;
                                $nhap->GioiTinh = $GioiTinh[$key->gioi_tinh];
                                $nhap->DiemManh = $key->diem_manh;
                                $nhap->DiemYeu  = $key->diem_yeu;
                                $nhap->ChieuCao = $key->chieu_cao;
                                $nhap->CanNang = $key->can_nang;
                                $nhap->NhomMau = $key->nhom_mau;
                                $nhap->NguyenQuan  = $key->nguyen_quan;
                                $nhap->NguyenQuan_Tp = $key->tinhthanh_pho_cua_nguyen_quan;
                                $nhap->TinhTrangHonNhan = $key->tinh_trang_hon_nhan;
                                $nhap->TrinhDoDaoTao = $key->trinh_do_dao_tao;
                                $nhap->NoiDaoTao = $key->noi_dao_tao;
                                $nhap->ChuyenNganh = $key->chuyen_nganh;
                                $nhap->EmailCoQuan = $key->email_co_quan;
                                $nhap->DTDD = $key->dt_di_dong;
                                

                                $nhap->SoCongChuan = $key->so_cong_chuan;
                                $nhap->DonViChamCong = $key->don_vi_cham_cong;
                                $nhap->ThamGiaCongDoan = $CongDoan[$key->tham_gia_cong_doan];
                                $nhap->save();
                                  
                            }
                            else{
                                $CountStaff++;
                            }
                        } 
                        else{
                            if($key->ngay_thu_viec != ""){
                                $nhap = new StaffModel;
                                $nhap->Staff_ID = $key->ma_nhan_vien;
                                $nhap->Full_name = $key->ho_va_ten;
                                $nhap->DOB = $key->dob_mmddyyyy;
                                $nhap->Start_work = $key->ngay_thu_viec;
                                $nhap->End_work = $key->ngay_nghi_viec;
                                $nhap->Birthplace = $key->noi_sinh;
                                $nhap->Current_Address = $key->cho_o_hien_nay;
                              
                                $nhap->HoTen_KC = $key->ho_va_ten_nguoi_lien_he_khan_cap;
                                $nhap->QuanHe_KC = $key->quan_he_nguoi_lien_he_khan_cap;
                                $nhap->DT_KC = $key->dt_di_dong_nguoi_lien_he_khan_cap;
                             
                                $nhap->MaViTriCongViec = $key->ma_vi_tri_cong_viec;
                               
                                $nhap->SoThich = $key->so_thich;
                                $nhap->MucTieuCaNhan = $key->muc_tieu_ca_nhan;
                                $nhap->TinhTrangSucKhoe = $key->tinh_trang_suc_khoe;
                                $nhap->Status_WK = 0 ;
                                $nhap->GioiTinh = $GioiTinh[$key->gioi_tinh];
                                $nhap->DiemManh = $key->diem_manh;
                                $nhap->DiemYeu  = $key->diem_yeu;
                                $nhap->ChieuCao = $key->chieu_cao;
                                $nhap->CanNang = $key->can_nang;
                                $nhap->NhomMau = $key->nhom_mau;
                                $nhap->NguyenQuan  = $key->nguyen_quan;
                                $nhap->NguyenQuan_Tp = $key->tinhthanh_pho_cua_nguyen_quan;
                                $nhap->TinhTrangHonNhan = $key->tinh_trang_hon_nhan;
                                $nhap->TrinhDoDaoTao = $key->trinh_do_dao_tao;
                                $nhap->NoiDaoTao = $key->noi_dao_tao;
                                $nhap->ChuyenNganh = $key->chuyen_nganh;
                                $nhap->EmailCoQuan = $key->email_co_quan;
                                $nhap->DTDD = $key->dt_di_dong;
                                

                                $nhap->SoCongChuan = $key->so_cong_chuan;
                                $nhap->DonViChamCong = $key->don_vi_cham_cong;
                                $nhap->ThamGiaCongDoan = $CongDoan[$key->tham_gia_cong_doan];
                                $nhap->save();
                            }

                            elseif ($key->ngay_chinh_thuc != "") {
                                $Start_work = $key->ngay_chinh_thuc->modify('-2 month');
                                    $nhap = new StaffModel;
                                    $nhap->Staff_ID = $key->ma_nhan_vien;
                                    $nhap->Full_name = $key->ho_va_ten;
                                    $nhap->DOB = $key->dob_mmddyyyy;
                                    $nhap->Start_work = $Start_work;
                                    $nhap->End_work = $key->ngay_nghi_viec;
                                    $nhap->Birthplace = $key->noi_sinh;
                                    $nhap->Current_Address = $key->cho_o_hien_nay;
                                    
                                $nhap->HoTen_KC = $key->ho_va_ten_nguoi_lien_he_khan_cap;
                                $nhap->QuanHe_KC = $key->quan_he_nguoi_lien_he_khan_cap;
                                $nhap->DT_KC = $key->dt_di_dong_nguoi_lien_he_khan_cap;
                             
                                $nhap->MaViTriCongViec = $key->ma_vi_tri_cong_viec;
                               
                                $nhap->SoThich = $key->so_thich;
                                $nhap->MucTieuCaNhan = $key->muc_tieu_ca_nhan;
                                $nhap->TinhTrangSucKhoe = $key->tinh_trang_suc_khoe;
                                $nhap->Status_WK = 0;
                                $nhap->GioiTinh = $GioiTinh[$key->gioi_tinh];
                                $nhap->DiemManh = $key->diem_manh;
                                $nhap->DiemYeu  = $key->diem_yeu;
                                $nhap->ChieuCao = $key->chieu_cao;
                                $nhap->CanNang = $key->can_nang;
                                $nhap->NhomMau = $key->nhom_mau;
                                $nhap->NguyenQuan  = $key->nguyen_quan;
                                $nhap->NguyenQuan_Tp = $key->tinhthanh_pho_cua_nguyen_quan;
                                $nhap->TinhTrangHonNhan = $key->tinh_trang_hon_nhan;
                                $nhap->TrinhDoDaoTao = $key->trinh_do_dao_tao;
                                $nhap->NoiDaoTao = $key->noi_dao_tao;
                                $nhap->ChuyenNganh = $key->chuyen_nganh;
                                $nhap->EmailCoQuan = $key->email_co_quan;
                                $nhap->DTDD = $key->dt_di_dong;
                                

                                $nhap->SoCongChuan = $key->so_cong_chuan;
                                $nhap->DonViChamCong = $key->don_vi_cham_cong;
                                $nhap->ThamGiaCongDoan = $CongDoan[$key->tham_gia_cong_doan];
                                $nhap->save();
                                    $nhap->save();
                            }
                            else{
                               $CountStaff++;
                            }
                        }  
                    }else{
                        $update = StaffModel::find($key->ma_nhan_vien);
                        $update->Full_name = $key->ho_va_ten;
                        $update->DOB = $key->dob_mmddyyyy;
                       
                        $update->Birthplace = $key->noi_sinh;
                        $update->Current_Address = $key->cho_o_hien_nay;
                       
                                $update->HoTen_KC = $key->ho_va_ten_nguoi_lien_he_khan_cap;
                                $update->QuanHe_KC = $key->quan_he_nguoi_lien_he_khan_cap;
                                $update->DT_KC = $key->dt_di_dong_nguoi_lien_he_khan_cap;
                                $update->End_work = $key->ngay_nghi_viec;
                                $update->MaViTriCongViec = $key->ma_vi_tri_cong_viec;
                               
                                $update->SoThich = $key->so_thich;
                                $update->MucTieuCaNhan = $key->muc_tieu_ca_nhan;
                                $update->TinhTrangSucKhoe = $key->tinh_trang_suc_khoe;
                                
                                $update->GioiTinh = $GioiTinh[$key->gioi_tinh];
                                $update->DiemManh = $key->diem_manh;
                                $update->DiemYeu  = $key->diem_yeu;
                                $update->ChieuCao = $key->chieu_cao;
                                $update->CanNang = $key->can_nang;
                                $update->NhomMau = $key->nhom_mau;
                                $update->NguyenQuan  = $key->nguyen_quan;
                                $update->NguyenQuan_Tp = $key->tinhthanh_pho_cua_nguyen_quan;
                                $update->TinhTrangHonNhan = $key->tinh_trang_hon_nhan;
                                $update->TrinhDoDaoTao = $key->trinh_do_dao_tao;
                                $update->NoiDaoTao = $key->noi_dao_tao;
                                $update->ChuyenNganh = $key->chuyen_nganh;
                                $update->EmailCoQuan = $key->email_co_quan;
                                $update->DTDD = $key->dt_di_dong;
                                

                                $update->SoCongChuan = $key->so_cong_chuan;
                                $update->DonViChamCong = $key->don_vi_cham_cong;
                                $update->ThamGiaCongDoan = $CongDoan[$key->tham_gia_cong_doan];
                                $update->save();
                    }
                }
            },'UTF-8');
                return redirect()->route('update');
          }      
        }
        public static function UpdateContribute(){
                $Nhanvien = StaffModel::all();
                
                foreach($Nhanvien as $key){
                    $search = HistoryModel::where('Staff_ID',$key->Staff_ID)->orderBy('created_at','DESC')->get()->first();

                    $update = DiemCongHienModel::find($search->Staff_ID);
                    if(!empty($update)){
                    $update->Thamnien = $search->Closing_Balance;
                    $update->save();
                    }
                }

        }
        public static function ShowDataTable(Request $Request){
       
            $condition = $Request->Datetime;

            if($condition == null){
                     $data = DiemDanhModel::join('STAFF','Diemdanh.Staff_ID','=','STAFF.Staff_ID')->select('Diemdanh.*','STAFF.Full_name')->get();
                    return view('Admin.AdminControl.GioDaoTao_view.table')->with('detailDD',$data);
            }
            else
                {
                    $data = BangChoDuyetModel::join('STAFF','BangChoDuyet.Staff_ID','=','STAFF.Staff_ID')->select('BangChoDuyet.*','STAFF.Full_name')->get();
                     return view('Admin.AdminControl.GioDaoTao_view.table2')->with('detailDD',$data);
                }

         
           
        }
        public static function editDataInDay(Request $Request){
            $Staff_ID = $Request->Staff_ID;
            $Event_Date = $Request->Event_Date;
            $Event_Name = $Request->Event_Name;
            $Categories = $Request->Categories;
            $Hours = $Request->Hours;
            $id = $Request->id;
                $update = BangChoDuyetModel::find($id);
                $update->Staff_ID = $Staff_ID;
                $update->Event_Name = $Event_Name;
                $update->Event_Date = $Event_Date;
                $update->Categories = $Categories;
                $update->Hours = $Hours;
                $update->save();
                return 'Đã chỉnh sửa thành công';

        }
        public static function deleteDataInDay(Request $Request){
            $id = $Request->id;
            BangChoDuyetModel::find($id)->delete();
            return 'Đã xóa thành công';
        }
}
class StoreThamNienTotal{
    public static  function Contribute_point(){
        $data = StaffModel::where('Status_WK',1)->get();
        foreach($data as $key){
            $getValues = HistoryModel::where("Staff_ID",$key->Staff_ID)->orderBy('created_at',"DESC")->get()->first();
            if($getValues != null)
           { 
            $check = Contribute_point::where('Staff_ID',$getValues->Staff_ID)->get()->first();
                if(!empty($check)){
                   
                $update  = Contribute_point::find($getValues->Staff_ID);
                $update->Tham_nien = $getValues->Closing_Balance;
                $update->save();
                }
                else{
                        $insert = new Contribute_point;
                $insert->Staff_ID = $getValues->Staff_ID;
                $insert->save();
                       $update  = Contribute_point::find($getValues->Staff_ID);
                $update->Tham_nien = $getValues->Closing_Balance;
                $update->save();   
                }
            }
        }
    }
}
