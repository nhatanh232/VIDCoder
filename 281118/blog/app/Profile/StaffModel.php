<?php

namespace App\Profile;

use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    protected $table= 'STAFF';
    protected $primaryKey = 'Staff_ID';
   protected $keyType = 'string';
   protected $fillable =[
   	'Staff_ID','Full_name',	'DOB',	'Start_work',	'End_work',	'Company',	'Status_WK',	'Birthplace',	'Current_Address',	'Contribute_point',	'Id_Card',	'created_at',	'updated_at',	'Department',	'NguyenQuan',	'NguyenQuan_Tp',	'TinhTrangHonNhan',	'GioiTinh',	'DanToc',	'TonGiao',	'QuocTich',	'TrinhDoDaoTao',	'NoiDaoTao',	'ChuyenNganh',	'NamTotNghiep',	'XepLoai',	'NgheNghiep',	'SoDtCoQuan',	'EmailCoQuan',	'DTDD',	'EmailCaNhan',	'HoTen_KC',	'QuanHe_KC',	'DT_KC',	'MaViTriCongViec',	'TenViTri',	'MaDonViCongTac',	'NgayThuViec',	'NgayChinhThuc',	'NhomMau',	'ChieuCao',	'CanNang',	'TinhTrangSucKhoe',	'MucTieuCaNhan',	'SoThich',	'DiemManh',	'DiemYeu',	'SoCongChuan',	'DonViChamCong',	'ThamGiaCongDoan',	'MaChamCong',	'Hinh',	'ThanhVien',	'MaDangKy'
   ];
}
