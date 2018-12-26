<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('index','UserController@index');
Route::get('login','LoginController@getLogin');
Route::post('login','LoginController@postLogin');
Route::get('','HomeController@getIndex');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('test',function(){
	return view('test');
});
Route::get('dangkyan',['as'=>'dangkyan','uses'=> 'DangkyanController@getTable']
);
Route::post('Success',['as'=>'updateDKA','uses'=>'DangkyanController@Dangkyan']);
Route::get('trangchu', 'HomeController@getIndex')->name('trangchu');
Route::post('password/email',['as'=>'password.email','uses'=>'Auth\ResetPasswordController@sendResetLinkEmail']);
Route::get('timkiem',['as'=>'timkiem','uses'=>'DangkyanController@Timkiemten']);
Route::get('thongke',['as'=>'thongke','uses'=> function(){
	return view('thongke');
}]);
Route::get('Xuat',['as'=>'Xuat','uses'=>'ExcelController@export']);
Route::get('Xuattong',['as'=>'Xuattong','uses'=>'ExcelController@DSNVthang']);
Route::get('events',['as'=> 'events.index','uses'=>'EventModelController@Calendar']);
Route::post('events', 'EventModelController@addEvent')->name('events.add');

Route::get('phong-hop',['as'=> 'events.indexh','uses'=>'EventModelHController@Calendar']);
Route::post('phong-hop', 'EventModelHController@addEvent')->name('events.addh');

Route::get('tong-viec','TongViecController@tongviec')->name('tongviec');
Route::get('tong-viec-hv','TongViecController@tongviechv')->name('tongviechv');
Route::get('detail','ThongBaoController@getThongbaodetail')->name('detail');

Route::get('phong-hop-hv',['as'=> 'events.indexhvh','uses'=>'EventModelHVHController@Calendar']);
Route::post('phong-hop-hv', 'EventModelHVHController@addEvent')->name('events.addhvh');

Route::get('phong-dt-hv',['as'=> 'events.indexhvdt','uses'=>'EventModelHVDTController@Calendar']);
Route::post('phong-dt-hv', 'EventModelHVDTController@addEvent')->name('events.addhvdt');

Route::get('phong-tv1-hv',['as'=> 'events.indexhvtv1','uses'=>'EventModelHVTV1Controller@Calendar']);
Route::post('phong-tv1-hv', 'EventModelHVTV1Controller@addEvent')->name('events.addhvtv1');

Route::get('phong-tv2-hv',['as'=> 'events.indexhvtv2','uses'=>'EventModelHVTV2Controller@Calendar']);
Route::post('phong-tv2-hv', 'EventModelHVTV2Controller@addEvent')->name('events.addhvtv2');

Route::get('phong-tv3-hv',['as'=> 'events.indexhvtv3','uses'=>'EventModelHVTV3Controller@Calendar']);
Route::post('phong-tv3-hv', 'EventModelHVTV3Controller@addEvent')->name('events.addhvtv3');

Route::get('phong-ZEN-vd',['as'=> 'events.indexvdzen','uses'=>'EventModelVDZENController@Calendar']);
Route::post('phong-ZEN-vd', 'EventModelVDZENController@addEvent')->name('events.addvdzen');

Route::get('phong-Nons1-vd',['as'=> 'events.indexvdnons1','uses'=>'EventModelVDNons1Controller@Calendar']);
Route::post('phong-Nons1-vd', 'EventModelVDNons1Controller@addEvent')->name('events.addvdnons1');

Route::get('phong-Nons2-vd',['as'=> 'events.indexvdnons2','uses'=>'EventModelVDNons2Controller@Calendar']);
Route::post('phong-Nons2-vd', 'EventModelVDNons2Controller@addEvent')->name('events.addvdnons2');

Route::get('phong-HT-vd',['as'=> 'events.indexvdht','uses'=>'EventModelVDHTController@Calendar']);
Route::post('phong-HT-vd', 'EventModelVDHTController@addEvent')->name('events.addvdht');

Route::get('phong-SBong-vd',['as'=> 'events.indexvdsbong','uses'=>'EventModelVDSBongController@Calendar']);
Route::post('phong-SBong-vd', 'EventModelVDSBongController@addEvent')->name('events.addvdsbong');

Route::get('phong-SHGT-vd',['as'=> 'events.indexvdshgt','uses'=>'EventModelVDSHGTController@Calendar']);
Route::post('phong-SHGT-vd', 'EventModelVDSHGTController@addEvent')->name('events.addvdshgt');

Route::get('phong-Kid-vd',['as'=> 'events.indexvdkid','uses'=>'EventModelVDKidController@Calendar']);
Route::post('phong-Kid-vd', 'EventModelVDKidController@addEvent')->name('events.addvdkid');

Route::get('phong-Yoga-vd',['as'=> 'events.indexvdyoga','uses'=>'EventModelVDYogaController@Calendar']);
Route::post('phong-Yoga-vd', 'EventModelVDYogaController@addEvent')->name('events.addvdyoga');

Route::get('phong-Bep-vd',['as'=> 'events.indexbep','uses'=>'EventModelVDBepController@Calendar']);
Route::post('phong-Bep-vd', 'EventModelVDBepController@addEvent')->name('events.addbep');

Route::get('phong-Minigym-vd',['as'=> 'events.indexvdminigym','uses'=>'EventModelVDMinigymController@Calendar']);
Route::post('phong-Minigym-vd', 'EventModelVDMinigymController@addEvent')->name('events.addvdminigym');

Route::get('EditThongBao','Quantri\ThongBaoController@Edit')->name('EditThongBao');
Route::get('AddPosts','Quantri\ThongBaoController@Add')->name('AddPosts');

Route::get('detailtlgt','HomeController@Thanhly');
Route::get('Taisancongty','HomeController@KhoPublic')->name('Taisancongty');
Route::get('detailTaisan','HomeController@detailTaisan')->name('detailTaisan');
// THANH LÝ GIÁ TRỊ
					

//	ADMIN PAGE
Route::get('AdminPage','AdminPage\AdminPageController@index')->middleware('auth');
Route::get('Phanquyen','AdminPage\AdminPageController@phanquyen')->name('Phanquyen')->middleware('Xacthuc');
Route::get('QLKhoAdmin','AdminPage\AdminPageController@QLKhoAdmin');
Route::post('EdditAuthen','AdminPage\AdminPageController@EdditAuthen')->name('EdditAuthen');

// Đặt xe
Route::get('mazda',['as'=> 'events.indexmazda','uses'=>'MazdaController@Calendar']);
Route::post('mazda', 'MazdaController@addEvent')->name('events.addmazda');
Route::get('zinger',['as'=> 'events.indexzinger','uses'=>'ZingerController@Calendar']);
Route::post('zinger', 'ZingerController@addEvent')->name('events.addzinger');


//gate Adminpage
Route::get('adminpage','AdminPage\QuanlykhoController@ShowAdmin')->middleware('auth');
//AdminPage_Kho
Route::group(['middleware'=>['AuthenQuanlykho']],function(){
// Kho version 2
// Route::post('NhapkhoExcel',"AdminPage\Qua")


// 
Route::get('kho','AdminPage\QuanlykhoController@ShowKho');
Route::get('Taisan','AdminPage\QuanlykhoController@TSPB');
Route::post('nhapkho','AdminPage\QuanlykhoController@NhapKho')->name('nhapkho');
Route::post('thuhoi','AdminPage\QuanlykhoController@Thuhoi')->name('Thuhoi');
Route::post('dieuchuyen','AdminPage\QuanlykhoController@Dieuchuyen')->name('Dieuchuyen');

Route::get("NV",'AdminPage\QuanlykhoController@GetInformartionNV')->name('NV');
Route::get("MTB",'AdminPage\QuanlykhoController@MTB')->name('MTB');
Route::get("MTB2",'AdminPage\QuanlykhoController@MTB2')->name('MTB2');

Route::get('bangdieuchuyen','AdminPage\QuanlykhoController@TableControl');
Route::post('xuatkho','AdminPage\QuanlykhoController@Xuatkho')->name('xuatkho');
Route::get('xuatkhov2','AdminPage\QuanlykhoController@XuatkhoV2')->name('xuatkhov2');
Route::post('xuatkhov2','AdminPage\QuanlykhoController@postXuatkhoV2');
Route::get('ShowdetailImg','AdminPage\QuanlykhoController@ShowImage');
Route::get('ShowdetailImgTSPB','AdminPage\QuanlykhoController@ShowImageTSPB');
Route::get('getMVT','AdminPage\QuanlykhoController@getMVT');
Route::get('lichsu','AdminPage\QuanlykhoController@history')->name('lichsu');
Route::get('lichsuTSPB','AdminPage\QuanlykhoController@historyTSPB')->name('lichsuTSPB');
Route::get('historyTSPB2','AdminPage\QuanlykhoController@historyTSPB2');
Route::get('getLocation','AdminPage\QuanlykhoController@getLocation')->middleware('cors');

Route::post('Dieuchuyensll','AdminPage\QuanlykhoController@Dieuchuyensll')->name('Dieuchuyensll');
Route::get('editKho','AdminPage\QuanlykhoController@editKho');
Route::get('getTen','AdminPage\QuanlykhoController@getTen');
Route::get('getMVTTen','AdminPage\QuanlykhoController@getMVT_Ten')->middleware('cors');
Route::get('ChinhsuaTSPB','AdminPage\QuanlykhoController@ChinhsuaTSPB');
Route::get('MVTtt','AdminPage\QuanlykhoController@MVTtt');
Route::get('getPX','AdminPage\QuanlykhoController@getPX');
Route::post('formXuatKhoV2','AdminPage\QuanlykhoController@formXuatKhoV2')->name('formXuatKhoV2');
Route::get('ViewFormXuat','Adminpage\QuanlykhoController@ViewFormXuat');
// Tài sản cá nhân
Route::get('bangluutru','AdminPage\TaiSanCaNhanController@ShowLuuTru');
Route::get('dangkycn','AdminPage\TaiSanCaNhanController@getDangkycn');
Route::post('dangkycn','AdminPage\TaiSanCaNhanController@postDangkycn')->name('dangkycn');
Route::get('hinhtscn','AdminPage\TaiSanCaNhanController@getImage');


// Import Export Excel Kho-TSPB
Route::get('getImport','Adminpage\TaiSanCaNhanController@getImport');
Route::post('postImport','Adminpage\TaiSanCaNhanController@postImport');


Route::post('postImportPB','AdminPage\TaiSanCaNhanController@postImportPB');
Route::post('ExportKho','AdminPage\QuanlykhoController@ExportKho')->name('ExportKho');
Route::post('postExportPB','AdminPage\QuanlykhoController@postExportPB');
Route::get('ExportPhieuXuat','AdminPage\QuanlykhoController@ExportPhieuXuat')->name('ExportPhieuXuat');

// tạm
Route::get('EditTSPB','AdminPage\QuanlykhoController@EditTSPB')->name('EditTSPB');
Route::post('DieuchuyenDetail','AdminPage\QuanlykhoController@DieuchuyenDetail')->name('DieuchuyenDetail');
});
// Nhập liệu
Route::group(['middleware'=>['AuthenNhapLieu']],function(){
	Route::get('khaibaohd','StoreProcedureProfile\StoreThamNien@khaibaohd');
	Route::get('pKhaibao','StoreProcedureProfile\StoreThamNien@pKhaibao');
	Route::post('pMahoatdong','AdminPage\ProfileController@pMahoatdong');
	Route::get('pMahoatdong_Ten','AdminPage\ProfileController@pMahoatdong_Ten');
	Route::get('SuccesMahoatdong','AdminPage\ProfileController@SuccesMahoatdong');
	Route::get('getDataDiemDanh_Ten','AdminPage\ProfileController@getDiemDanh_Ten');
Route::get('getSuccessTen','AdminPage\ProfileController@getSuccessTen');
	Route::get('getDataDiemDanh','AdminPage\ProfileController@getDataDiemDanh');
	Route::get('getDiemDanh','Adminpage\ProfileController@getDiemDanh');
	Route::get('pDiemDanh','AdminPage\ProfileController@postDiemDanh')->name('pDiemDanh');
//Cống hiến
Route::get('diemconghien','AdminPage\ProfileController@formCongHien');
Route::post('postDiemCongHien','AdminPage\ProfileController@postDiemCongHien')->name('postDiemCongHien');

Route::get('update','StoreProcedureProfile\StoreThamNien@Store_main')->name('update');
Route::get('Store_main_total','StoreProcedureProfile\StoreThamNien@Store_main_total');
Route::post('importamis','StoreProcedureProfile\StoreThamNien@Import_Amis_ICT')->name('importamis');

Route::get('ShowDataTable','StoreProcedureProfile\StoreThamNien@ShowDataTable');
Route::get('editDataInDay','StoreProcedureProfile\StoreThamNien@editDataInDay');
Route::get('deleteDataInDay','StoreProcedureProfile\StoreThamNien@deleteDataInDay');
});
//Adminpage_Admin
Route::group(['middleware'=>['AuthenAdmin']],function(){

Route::get('phanquyen','AdminPage\AdminController@getInformationNV');
Route::get('AuthenQLkho','AdminPage\AdminController@AuthenQLkho');
Route::get('AuthenThanhlygt','AdminPage\AdminController@AuthenThanhlygt');
Route::get('AuthenThongbao','AdminPage\AdminController@AuthenThongbao');
Route::get('AuthenNhapLieu','AdminPage\AdminController@AuthenNhapLieu');
Route::get('AuthenAdmin','AdminPage\AdminController@AuthenAdmin');
Route::get('QuaysoAdmin','AdminPage\AdminController@QuaysoAdmin');
Route::get("postSo",'AdminPage\AdminController@postSo')->middleware('cors');
Route::post('ImportDSquay','AdminPage\AdminController@ImportDSquay')->name('ImportDSquay');
Route::get("deleteSo",'AdminPage\AdminController@deleteSo');
// ICT _Giờ đào tọa
Route::get('Duyetdt','AdminPage\AdminController@DuyetGioDaoTao');
Route::get('btnDuyet','AdminPage\AdminController@pDuyetGioDaoTao');


														// end
});




//Adminpage_Thongbao
Route::group(['middleware'=>['AuthenThongbao']],function(){
	// Route::get('ShowForm','ThongBaoController@Show');



});


//Thông tin nhân sự
Route::get('ShowInfo','AdminPage\NhanSuController@ShowInfo');
Route::get('GetInfo','Adminpage\NhanSuController@getInfo');
// Thông tin tài sản cá nhân
Route::get('GetTstlcn','AdminPage\NhanSuController@GetTstlcn');

// Thanh lý giá trị
Route::group(['middleware'=>['AuthenThanhlygt']],function(){
	Route::get('getForm','AdminPage\ThanhLyController@getForm');
	Route::get('Manhanvien','AdminPage\ThanhLyController@Manhanvien');
	Route::post('postForm','AdminPage\ThanhLyController@postForm')->name('postForm');

});

Route::get('detailTLGT','AdminPage\ThanhLyController@detailTLGT');
	
Route::get('ChinhsuaHis','AdminPage\QuanlykhoController@ChinhsuaHis')->name('ChinhsuaHis');


	Route::get('getRe','AdminPage\ThongBaoController@getRe');
	// Route::post('postRe','AdminPage\ThongBaoController@postRe');
	Route::get('Refesh','AdminPage\ThongBaoController@Refesh');


Route::get('Nguoidacbiet','AdminPage\ThongBaoController@Nguoidacbiet');
Route::get('getInfo','AdminPage\ProfileController@getInfo');
Route::get('Information','AdminPage\ProfileController@Information')->name('Information');
Route::post('ImportVD','AdminPage\ProfileController@ImportFile')->name('ImportFileVD');
// Route::get('update','AdminPage\ProfileController@Tesst');
Route::post('ImportFileDiemDanh','AdminPage\ProfileController@ImportFileDiemDanh')->name('ImportFileDiemDanh');

// Nhân sự 
Route::get('getInfoAdmin','AdminPage\ProfileController@getInfoAdmin');
Route::get('getHistoryDetail','AdminPage\ProfileController@getHistoryDetail');



//Lịch sử 
Route::get('getHistory','AdminPage\ProfileController@getHistory');
Route::get('getHistoryDiemdanh','AdminPage\ProfileController@getHistoryDiemdanh');


// Bảo trì bảo dưỡng
Route::group(['middleware'=>['auth']],function(){	
	Route::get('baoduong','AdminPage\BaoTriController@getBaoDuong');
	Route::get('baoDuong','AdminPage\BaoTriController@baoDuong');
	Route::post('updateBaoDuong','AdminPage\BaoTriController@updateBaoDuong')->name('updateBaoDuong');
	Route::get('baotri','AdminPage\BaoTriController@getBaoTri');
	Route::post('updateBaoTri','AdminPage\BaoTriController@updateBaoTri')->name('updateBaoTri');
	Route::get('lichsuBD','AdminPage\BaoTriController@getHistory');
});

Route::get('ProfileId','YourProfile\YourProfileController@getYouProfile')->name('ProfileId');
Route::get('ChartCH','YourProfile\YourProfileController@ChartCH');
Route::get('Chartpage','YourProfile\YourProfileController@Chartpage')->name('Chartpage');
Route::get('BangDaoTao','YourProfile\YourProfileController@BangDaoTao')->name('BangDaoTao');
Route::get('ChartDaoTao','YourProfile\YourProfileController@ChartDaoTao')->name('ChartDaoTao');
Route::get('Tableau','AdminPage\AdminController@Tableau');


// Hệ thống điểm danh
Route::get('Diem-Danh','YourProfile\HeThongDiemDanh\DiemDanhController@viewDiemDanh');
Route::post('CheckDiemDanh','YourProfile\HeThongDiemDanh\DiemDanhController@CheckDiemDanh');


// Đăng Kí Ăn
Route::get('viewAn','suatan\SuatAnController@viewAn');
Route::get('getMenu','suatan\SuatAnController@menuThang');
Route::post('postDangKiAn','suatan\SuatAnController@postDangKiAn')->name('postDangKiAn');
Route::get('checkDK','suatan\SuatAnController@checkDK');
Route::get('suatancanhan','suatan\SuatAnController@getSuatAnCaNhan');
Route::post('updateSuatAn','suatan\SuatAnController@updateSuatAn')->name('updateSuatAn');
Route::get('viewAnAdmin','suatan\SuatAnController@viewAnAdmin');
Route::get('getSuatAn','suatan\SuatAnController@getSuatAn');
Route::get('getNVInfo','AdminPage\NhanSuController@getNVInfo');
Route::get('getSuatAnTmp','suatan\SuatAnController@getDataSuatAnTmp');


Route::get('preKi','AdminPage\ThongBaoController@preQS');