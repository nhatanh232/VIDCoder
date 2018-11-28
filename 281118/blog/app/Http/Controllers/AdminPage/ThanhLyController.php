<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Storage;
use Carbon\Carbon;
use App\ThanhlyModel;
Use App\CustomerProvider\LuuTruPTNModel;
class ThanhLyController extends Controller
{

    public function getForm(){
    	return view('Admin.Thanhlygiatri.Formdangkygt');
    }
    public function postForm(Request $Request){
    	// Variable
    		$hinhanh1 = null;
    		$hinhanh2 = null;
    		$hinhanh3 = null;
    	 date_default_timezone_set("Asia/Ho_Chi_Minh");
    		$Bophan = $Request->Bophan;							$Sdtg = $Request->Sdtg;
    		$Chutaisan = $Request->Chutaisan;					$Sdtn = $Request->Sdtn;
    		$Manv = $Request->Manv;								$Giakivong = $Request->Giakivong;
    		$Thoihan = $Request->Thoihan;						$Dinhgia = $Request->Dinhgia;
    		$Tents = $Request->Tentaisan;						$Giaytokemtheo = $Request->Chungtu;
    		$Mota = $Request->Mota;								$Tinhtrang = $Request->Tinhtrangdanhgia;
    		$Ngaytiepnhan = $Request->Ngaytiepnhan;
    		$Mats = \DB::table('taisantlcn')->orderBy('MTS','DESC')->get()->first();
    		$Sophieutn = ++$Mats->MTS;
    		$date = getdate();
    		 
    		  $time = date('H');
    		
    	
    		if($Request->has('Hinh')){
    		$hinhanh = $Request->Hinh->getClientOriginalName();
          		  $Request->Hinh->move('layouts/images/thanhly',$hinhanh);
    		}
    		if($Request->has('Hinh1')){
    		$hinhanh1 = $Request->Hinh1->getClientOriginalName();
          		  $Request->Hinh1->move('layouts/images/thanhly',$hinhanh1);
    		}
    		if($Request->has('Hinh2')){
    		$hinhanh2 = $Request->Hinh2->getClientOriginalName();
          		  $Request->Hinh2->move('layouts/images/thanhly',$hinhanh2);
    		}
    		if($Request->has('Hinh3')){
    		$hinhanh3 = $Request->Hinh3->getClientOriginalName();
          		  $Request->Hinh3->move('layouts/images/thanhly',$hinhanh3);
    		}

    		$day_1 = $Thoihan ;
				$day_2 = date('Y-m-d') ; //current date
			
			
    		$thoigiangui = (strtotime($day_1) - strtotime($day_2)) / (60 * 60 * 24);
    		
    $filename = 'PTNso_'.$Sophieutn.'.docx';

    // END Variable
// Phiêu tiếp nhận
                $process =  new \PhpOffice\PhpWord\TemplateProcessor('Form\\phieutiepnhan.docx');
                 $process->setValue('id',$Sophieutn);
                 $process->setValue('Chutaisan',$Chutaisan);
                 
                  $process->setValue('Thoigianbangiao',$thoigiangui);
                   $process->setValue('Ngay',$date['mday']);
                     $process->setValue('Thang',$date['mon']);
                       $process->setValue('Nam',$date['year']);
                         $process->setValue('Gio',$time);
                           $process->setValue('Phut',$date['minutes']);
                    $process->setValue('SDTG',$Sdtg);
                     $process->setValue('SDTN',$Sdtn);
 			$process->setValue('Tents',$Tents);
 			 $process->setValue('Giaytokemtheo',$Giaytokemtheo);
 			 $process->setValue('Tinhtrang',$Tinhtrang);
 			
                $process->setValue('Nguoinhap',Auth::user()->name);
                 $process->setValue('Bophan',$Bophan);
                $process->setValue('Ngaynhan',date('d-m-Y',strtotime(now())));
                   $process->setValue('Thoihan',date('d-m-Y',strtotime($Thoihan)));
                $process->saveAs(storage_path('app\\public\\'.$filename));
// end phiếu tiếp nhận
// Nhập thanh lý tài sản
                $thanhly = new ThanhLyModel;
                $thanhly->Manv = $Manv;				$thanhly->MTS=$Sophieutn;
                $thanhly->Ten = $Tents;				$thanhly->Hinh = $hinhanh;
                $thanhly->Mota = $Mota;				$thanhly->Hinh1 = $hinhanh1;
                									$thanhly->Hinh2 = $hinhanh2;
                									$thanhly->Hinh3 = $hinhanh3;
                $thanhly->Giadexuat = $Dinhgia;		$thanhly->Giakivong = $Giakivong;
                $thanhly->Trangthai = 0;			$thanhly->Thoihan = $Thoihan;
                $thanhly->Tinhtrang = $Tinhtrang; 	$thanhly->Giayto = $Giaytokemtheo;
                $thanhly->save();
// End thanh lý tài sản
// Nhập phiếu tiếp nhận
                $luutru = new LuuTruPTNModel;
                $luutru->Manv = $Manv;					$luutru->Sophieu = $Sophieutn;
                $luutru->Nguoigiao = $Chutaisan; 		$luutru->Nguoinhan = Auth::user()->name;
                $luutru->Sdtn = $Sdtn;					$luutru->Sdtg = $Sdtg;
                $luutru->Tinhtrang = $Tinhtrang; 		$luutru->Ngaynhan = $Ngaytiepnhan;
                $luutru->Thoihan = $Thoihan;				$luutru->Giayto = $Giaytokemtheo;
                $luutru->save();
               return response()->download(storage_path('app\\public\\'.$filename));
    }
    public function Manhanvien(Request $Request){
    	$data = \DB::table('dsnv')->where(['Hoten'=>$Request->Ten,'Phongban'=>$Request->Bophan])->get()->first();
    	return $data->Manv;
    }
    public function detailTLGT(Request $Request){
    	$data = \DB::table('taisantlcn')->where('MTS',$Request->MTS)->get()->first();
    	return view('Admin.Thanhlygiatri.detailProduct')->with(['data'=>$data]);
    }
}
