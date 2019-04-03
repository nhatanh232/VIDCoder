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
use App\Profile\HOATDONGNOIBOmodel;
use App\Profile\DIEMDANHHOATDONGmodel;
use App\Profile\BoPhanModel;
use App\Profile\ThongKeDiemCongHienModel;
use Carbon\Carbon;
use Excel;

class StoreThamNienVersion2Controller extends Controller
{
    public function Update_Staff_By_Amis(Request $Request){
        $file = $Request->file;
       

        Excel::selectSheets(array('Hồ sơ nhân viên'))->load($file,function($reader){
        	$Status = array('Đang làm việc'=>'1','Nghỉ việc'=>'0','Thử việc'=>'3',''=>'4');
            $GioiTinh = array('Nam'=> 0 , 'Nữ'=> 1);
            $Company = array('HV'=>'Hồn Việt','TA'=>'Tâm An','VD'=>'Viễn Đông','KH'=>'Khánh Hội');
            $CongDoan = array('Có'=>1 , "Không" => 0);
            $reader->formatDates(true,'d-m-Y');
            $data = $reader->get(array('ma_nhan_vien',
                    'ho_va_ten',
                    'gioi_tinh',
                    'ngay_sinh',
                    'noi_sinh',
                    'ton_giao',
                    'quoc_tich',
                    'trinh_do_dao_tao',
                    'cho_o_hien_nay',
                    'ngay_thu_viec',
                    'ngay_chinh_thuc',
                    'ngay_nghi_viec',
                    'trang_thai_lao_dong',
                    'ma_vi_tri_cong_viec',
                    'ma_don_vi_cong_tac',
                    'quan_ly_truc_tiep',
                    'nhom_mau',
                    'muc_tieu_ca_nhan',
                    'so_thich',
                    'nguyen_quan',
                    'tinhthanh_pho_cua_nguyen_quan',
                    'tinh_trang_hon_nhan','trinh_do_dao_tao',
                    'tinh_trang_suc_khoe',
                    'diem_manh',
                    'diem_yeu',
                    'so_cong_chuan',
                    'don_vi_cham_cong',
                    'tham_gia_cong_doan','chieu_cao',
                    'can_nang',
                    'ten_don_vi_cong_tac',
                    'ho_va_ten_nguoi_lien_he_khan_cap',
                    'quan_he_nguoi_lien_he_khan_cap',
                    'dt_di_dong_nguoi_lien_he_khan_cap',
                    'noi_dao_tao',
                    'chuyen_nganh',
                    'email_co_quan',
                    'dt_di_dong'
                ));
                   foreach ($data as $key) {
                    	// Cập Nhật Nhân Viên
                   $company_mabophan = explode('_',$key->ma_don_vi_cong_tac);
             	
                        if(StaffModel::find($key->ma_nhan_vien)){
                            $update = StaffModel::find($key->ma_nhan_vien);
                            $update->Full_name = $key->ho_va_ten;
                         		if(!empty($key->ngay_sinh))
                            $update->DOB = Carbon::createFromFormat('d-m-Y',$key->ngay_sinh);
                            	if(!empty($key->ngay_nghi_viec))
                            $update->End_work =  Carbon::createFromFormat('d-m-Y',$key->ngay_nghi_viec); /* Ngày nghĩ việc   */
                     		   if(!empty($company_mabophan))
                        	$update->Company = $Company[$company_mabophan[0]];		/* CÔNG TY */
                        	$update->Status_WK = $Status[$key->trang_thai_lao_dong]; 	/*  Trạng Thái Làm việc    */
                     		$update->Birthplace = $key->noi_sinh;
                            $update->Current_Address = $key->cho_o_hien_nay;
                            $update->Department = $key->ten_don_vi_cong_tac;
                            $update->HoTen_KC = $key->ho_va_ten_nguoi_lien_he_khan_cap;
                            $update->QuanHe_KC = $key->quan_he_nguoi_lien_he_khan_cap;
                            $update->DT_KC = $key->dt_di_dong_nguoi_lien_he_khan_cap;
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
                         	   if(!empty($company_mabophan))
                            $update->MaBoPhan = $key->ma_don_vi_cong_tac;
                            $update->save();
                        }
                        // Nhập Mới Nhân Viên
                        else{
                    
                        		$nhap = new StaffModel;
                                $nhap->Staff_ID = $key->ma_nhan_vien;
                                $nhap->Full_name = $key->ho_va_ten;
                                	if(!empty($key->ngay_sinh))
                                $nhap->DOB = Carbon::createFromFormat('d-m-Y',$key->ngay_sinh);
                            		if(!empty($key->ngay_thu_viec))
                                $nhap->Start_work =Carbon::createFromFormat('d-m-Y',$key->ngay_thu_viec);
                         		   if(!empty($company_mabophan))
                        		$nhap->Company = $Company[$company_mabophan[0]];
                                $nhap->Birthplace = $key->noi_sinh;
                                $nhap->Current_Address = $key->cho_o_hien_nay;
                                $nhap->Department = $key->ten_don_vi_cong_tac;
                                $nhap->HoTen_KC = $key->ho_va_ten_nguoi_lien_he_khan_cap;
                                $nhap->QuanHe_KC = $key->quan_he_nguoi_lien_he_khan_cap;
                                $nhap->DT_KC = $key->dt_di_dong_nguoi_lien_he_khan_cap;          
                                $nhap->MaViTriCongViec = $key->ma_vi_tri_cong_viec;
                                $nhap->SoThich = $key->so_thich;
                                $nhap->MucTieuCaNhan = $key->muc_tieu_ca_nhan;
                                $nhap->TinhTrangSucKhoe = $key->tinh_trang_suc_khoe;
                                $nhap->Status_WK = $Status[$key->trang_thai_lao_dong];
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
                                   if(!empty($company_mabophan))
                          		$nhap->MaBoPhan =$key->ma_don_vi_cong_tac;
                                $nhap->save();
                        }
                        // Cập nhật Bộ Phận
                        		// if(!BoPhanModel::find($key->ma_don_vi_cong_tac)){
                        		// 	$staffqldv = StaffModel::where('Full_name',$key->quan_ly_truc_tiep)->select('Staff_ID')->get()->first();
                        		// 	$nhap = new BoPhanModel;
                        		// 	$nhap->MaBoPhan = $key->ma_don_vi_cong_tac;
                        		// 	$nhap->CongTy =  $Company[$company_mabophan[0]];
                        		// 	$nhap->BoPhan = $key->ten_don_vi_cong_tac;
                        		// 	$nhap->TruongBoPhan = $staffqldv->Staff_ID;
                        		// 	$nhap->save();
                        		// }
                    }
             });
    }

    public function Update_TraiNghiem_VanHoa_010319(){

    }
    public function DangKyHatNhan(){
        
    }

}
