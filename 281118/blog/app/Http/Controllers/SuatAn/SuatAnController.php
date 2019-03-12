<?php

namespace App\Http\Controllers\SuatAn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuatAn\SuatAnModel;
use App\SuatAn\NVDKAnModel;
use App\Profile\StaffModel;
use Auth;
use Carbon\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Writer;
use Excel;
use PHPExcel_Worksheet_Drawing;

class SuatAnController extends Controller
{
    public function viewAn(){        
    	$user = Auth::user()->Manv;
    	return view('suatan.dangkisuatan')->with('user',$user);
    }

    public function menuThang(){
    	$data = \DB::select("exec menuThang");
    	return $data;
    }

    public function postDangKiAn(Request $Request){
    	$MaNV = $Request->MaNV;
    	$ThangDK = $Request->ThangDK;
    	$NamDK = $Request->NamDK;
    	$Ngay1 = $Request->Ngay1;
    	$Ngay2 = $Request->Ngay2;
    	$Ngay3 = $Request->Ngay3;
    	$Ngay4 = $Request->Ngay4;
    	$Ngay5 = $Request->Ngay5;
    	$Ngay6 = $Request->Ngay6;
    	$Ngay7 = $Request->Ngay7;
    	$Ngay8 = $Request->Ngay8;
    	$Ngay9 = $Request->Ngay9;
    	$Ngay10 = $Request->Ngay10;
    	$Ngay11 = $Request->Ngay11;
    	$Ngay12 = $Request->Ngay12;
    	$Ngay13 = $Request->Ngay13;
    	$Ngay14 = $Request->Ngay14;
    	$Ngay15 = $Request->Ngay15;
    	$Ngay16 = $Request->Ngay16;
    	$Ngay17 = $Request->Ngay17;
    	$Ngay18 = $Request->Ngay18;
    	$Ngay19 = $Request->Ngay19;
    	$Ngay20 = $Request->Ngay20;
    	$Ngay21 = $Request->Ngay21;
    	$Ngay22 = $Request->Ngay22;
    	$Ngay23 = $Request->Ngay23;
    	$Ngay24 = $Request->Ngay24;
    	$Ngay25 = $Request->Ngay25;
    	$Ngay26 = $Request->Ngay26;
    	$Ngay27 = $Request->Ngay27;
    	$Ngay28 = $Request->Ngay28;
    	$Ngay29 = $Request->Ngay29;
    	$Ngay30 = $Request->Ngay30;
    	$Ngay31 = $Request->Ngay31;

    	$nhap = new SuatAnModel();
    	$nhap->MaNV = $MaNV;
    	$nhap->ThangDK = $ThangDK;
    	$nhap->NamDK = $NamDK;
    	$nhap->Ngay1 = $Ngay1;
    	$nhap->Ngay2 = $Ngay2;
    	$nhap->Ngay3 = $Ngay3;
    	$nhap->Ngay4 = $Ngay4;
    	$nhap->Ngay5 = $Ngay5;
    	$nhap->Ngay6 = $Ngay6;
    	$nhap->Ngay7 = $Ngay7;
    	$nhap->Ngay8 = $Ngay8;
    	$nhap->Ngay9 = $Ngay9;
    	$nhap->Ngay10 = $Ngay10;
    	$nhap->Ngay11 = $Ngay11;
    	$nhap->Ngay12 = $Ngay12;
    	$nhap->Ngay13 = $Ngay13;
    	$nhap->Ngay14 = $Ngay14;
    	$nhap->Ngay15 = $Ngay15;
    	$nhap->Ngay16 = $Ngay16;
    	$nhap->Ngay17 = $Ngay17;
    	$nhap->Ngay18 = $Ngay18;
    	$nhap->Ngay19 = $Ngay19;
    	$nhap->Ngay20 = $Ngay20;
    	$nhap->Ngay21 = $Ngay21;
    	$nhap->Ngay22 = $Ngay22;
    	$nhap->Ngay23 = $Ngay23;
    	$nhap->Ngay24 = $Ngay24;
    	$nhap->Ngay25 = $Ngay25;
    	$nhap->Ngay26 = $Ngay26;
    	$nhap->Ngay27 = $Ngay27;
    	$nhap->Ngay28 = $Ngay28;
    	$nhap->Ngay29 = $Ngay29;
    	$nhap->Ngay30 = $Ngay30;
    	$nhap->Ngay31 = $Ngay31;
    	$nhap->save();
    	return back();
    }

    public function checkDK(Request $Request){
    	$MaNV = $Request->MaNV;
    	$ThangDK = $Request->ThangDK;
    	$NamDK = $Request->NamDK;
    	$data = \DB::table('SuatAn')->where(['MaNV'=>$MaNV,'ThangDK'=>$ThangDK,'NamDK'=>$NamDK])->get();
    	return $data;
    }

    public function getSuatAnCaNhan(Request $Request){
    	$user = Auth::user()->Manv;
    	return view('suatan.suatancanhan')->with('user',$user);
    }

    public function updateSuatAn(Request $Request){
        $MaNV = $Request->MaNV;
        $ThangDK = $Request->ThangDK;
        $NamDK = $Request->NamDK;
        $Ngay1 = $Request->Ngay1;
        $Ngay2 = $Request->Ngay2;
        $Ngay3 = $Request->Ngay3;
        $Ngay4 = $Request->Ngay4;
        $Ngay5 = $Request->Ngay5;
        $Ngay6 = $Request->Ngay6;
        $Ngay7 = $Request->Ngay7;
        $Ngay8 = $Request->Ngay8;
        $Ngay9 = $Request->Ngay9;
        $Ngay10 = $Request->Ngay10;
        $Ngay11 = $Request->Ngay11;
        $Ngay12 = $Request->Ngay12;
        $Ngay13 = $Request->Ngay13;
        $Ngay14 = $Request->Ngay14;
        $Ngay15 = $Request->Ngay15;
        $Ngay16 = $Request->Ngay16;
        $Ngay17 = $Request->Ngay17;
        $Ngay18 = $Request->Ngay18;
        $Ngay19 = $Request->Ngay19;
        $Ngay20 = $Request->Ngay20;
        $Ngay21 = $Request->Ngay21;
        $Ngay22 = $Request->Ngay22;
        $Ngay23 = $Request->Ngay23;
        $Ngay24 = $Request->Ngay24;
        $Ngay25 = $Request->Ngay25;
        $Ngay26 = $Request->Ngay26;
        $Ngay27 = $Request->Ngay27;
        $Ngay28 = $Request->Ngay28;
        $Ngay29 = $Request->Ngay29;
        $Ngay30 = $Request->Ngay30;
        $Ngay31 = $Request->Ngay31;
        // Cập nhật suất ăn
        \DB::table('SuatAn')->where(['MaNV'=>$MaNV,'ThangDK'=>$ThangDK,'NamDK'=>$NamDK])->update(['Ngay1'=>$Ngay1,'Ngay2'=>$Ngay2,'Ngay3'=>$Ngay3,'Ngay4'=>$Ngay4,'Ngay5'=>$Ngay5,'Ngay6'=>$Ngay6,'Ngay7'=>$Ngay7,'Ngay8'=>$Ngay8,'Ngay9'=>$Ngay9,'Ngay10'=>$Ngay10,'Ngay11'=>$Ngay11,'Ngay12'=>$Ngay12,'Ngay13'=>$Ngay13,'Ngay14'=>$Ngay14,'Ngay15'=>$Ngay15,'Ngay16'=>$Ngay16,'Ngay17'=>$Ngay17,'Ngay18'=>$Ngay18,'Ngay19'=>$Ngay19,'Ngay20'=>$Ngay20,'Ngay21'=>$Ngay21,'Ngay22'=>$Ngay22,'Ngay23'=>$Ngay23,'Ngay24'=>$Ngay24,'Ngay25'=>$Ngay25,'Ngay26'=>$Ngay26,'Ngay27'=>$Ngay27,'Ngay28'=>$Ngay28,'Ngay29'=>$Ngay29,'Ngay30'=>$Ngay30,'Ngay31'=>$Ngay31]);
        return back();
    }

    public function viewAnAdmin(){
        $user = Auth::user()->Manv;
        return view('Admin.SuatAnAdmin.mainSuatAn')->with('user',$user);
    }

    public function getSuatAn(Request $Request){
        $today = Carbon::now();
        if($today->dayOfWeek == 5){
            $nextDay = $today->addDay(3);
        }else if($today->dayOfWeek == 6){
            $nextDay = $today->addDay(2);
        }else {
            $nextDay = $today->addDay(1);
        }
        $data = \DB::select(\DB::raw("select Type,count(Type) as SL from DangKiSuatAn where Date = '$nextDay' group by Type"));
        return $data; 
    }

    public function getDataSuatAnTmp(){
        $today = Carbon::now();
        if($today->dayOfWeek == 5){
            $nextDay = $today->addDay(3);
        }else if($today->dayOfWeek == 6){
            $nextDay = $today->addDay(2);
        }else {
            $nextDay = $today->addDay(1);
        }        
        $data = \DB::select(\DB::raw("select d.*,nv.Name,nv.Department from DangKiSuatAn d, NVDKAn nv where Date = '$nextDay' and d.Staff_ID = nv.Staff_ID 
            order by case when nv.Department = N'BGĐ' then 1
            when nv.Department = N'Ban Trợ Lý' then 2
            when nv.Department = N'NS-HC VĐ' then 3
            when nv.Department = N'Kế Toán VĐ' then 4
            when nv.Department = N'TM VĐ' then 5
            when nv.Department = N'CSVC VĐ' then 6
            when nv.Department = N'DACĐ VĐ' then 7
            when nv.Department = N'NS-HC TL' then 8
            when nv.Department = N'Kế Toán TL' then 9
            when nv.Department = N'Nhập Khẩu TL' then 10
            when nv.Department = N'Kinh Doanh TL' then 11
            when nv.Department = N'Hồn Việt' then 12
            when nv.Department = N'PROCI' then 13
            when nv.Department = N'KHÁNH HỘI' then 14
            when nv.Department = N'ZEN phục vụ' then 15
            when nv.Department = N'ZEN Quầy Nước' then 16
            when nv.Department = N'NH ZEN Tạp vụ' then 17
            when nv.Department = N'ZEN Bếp' then 18
            when nv.Department = N'Zen Maketing' then 19
            when nv.Department = N'Zen Thu Mua' then 20
            else nv.Department end asc"));
        return $data;
    }

    public function exportFileSuatAn1(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        header('Content-Type: text/html; charset=utf-8');
        $today = Carbon::now();
        if($today->dayOfWeek == 5){
            $nextDay = $today->addDay(3);
        }else if($today->dayOfWeek == 6){
            $nextDay = $today->addDay(2);
        }else {
            $nextDay = $today->addDay(1);
        }
        $data = \DB::select(\DB::raw("select d.*,nv.Name,nv.Department from DangKiSuatAn d, NVDKAn nv where Date = '$nextDay' and d.Staff_ID = nv.Staff_ID 
            order by case when nv.Department = N'BGĐ' then 1
            when nv.Department = N'Ban Trợ Lý' then 2
            when nv.Department = N'NS-HC VĐ' then 3
            when nv.Department = N'Kế Toán VĐ' then 4
            when nv.Department = N'TM VĐ' then 5
            when nv.Department = N'CSVC VĐ' then 6
            when nv.Department = N'DACĐ VĐ' then 7
            when nv.Department = N'NS-HC TL' then 8
            when nv.Department = N'Kế Toán TL' then 9
            when nv.Department = N'Nhập Khẩu TL' then 10
            when nv.Department = N'Kinh Doanh TL' then 11
            when nv.Department = N'Hồn Việt' then 12
            when nv.Department = N'PROCI' then 13
            when nv.Department = N'KHÁNH HỘI' then 14
            when nv.Department = N'ZEN phục vụ' then 15
            when nv.Department = N'ZEN Quầy Nước' then 16
            when nv.Department = N'NH ZEN Tạp vụ' then 17
            when nv.Department = N'ZEN Bếp' then 18
            when nv.Department = N'Zen Maketing' then 19
            when nv.Department = N'Zen Thu Mua' then 20
            else nv.Department end asc"));
        $date = $nextDay->day."-".$nextDay->month."-".$nextDay->year;
        $filename = 'SuatAn_'.$date.'.docx';

        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $process  = new TemplateProcessor('Form\\suatan.docx');

        $process->setValue('day',$nextDay->day);
        $process->setValue('month',$nextDay->month);
        $process->setValue('year',$nextDay->year);        
        $process->cloneRow('i',sizeof($data));
        $i = 1;
        for($i; $i<= sizeof($data);$i++){
            $process->setValue('i#'.$i,$i);
            $process->setValue('name#'.$i,$data[$i-1]->Name);
            $process->setValue('department#'.$i,htmlspecialchars($data[$i-1]->Department));
            $process->setValue('type#'.$i,$data[$i-1]->Type);
        }
        $process->saveAs(storage_path('app\\public\\'.$date.'.docx'));
        return response()->download(storage_path('app\\public\\'.$date.'.docx'));
    }

    public function exportFileSuatAn(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        header('Content-Type: text/html; charset=utf-8');
        $today = Carbon::now();
        if($today->dayOfWeek == 5){
            $nextDay = $today->addDay(3);
        }else if($today->dayOfWeek == 6){
            $nextDay = $today->addDay(2);
        }else {
            $nextDay = $today->addDay(1);
        }
        $data = \DB::select(\DB::raw("select d.*,nv.Name,nv.Department from DangKiSuatAn d, NVDKAn nv where Date = '$nextDay' and d.Staff_ID = nv.Staff_ID 
            order by case when nv.Department = N'BGĐ' then 1
            when nv.Department = N'Ban Trợ Lý' then 2
            when nv.Department = N'NS-HC VĐ' then 3
            when nv.Department = N'Kế Toán VĐ' then 4
            when nv.Department = N'TM VĐ' then 5
            when nv.Department = N'CSVC VĐ' then 6
            when nv.Department = N'DACĐ VĐ' then 7
            when nv.Department = N'NS-HC TL' then 8
            when nv.Department = N'Kế Toán TL' then 9
            when nv.Department = N'Nhập Khẩu TL' then 10
            when nv.Department = N'Kinh Doanh TL' then 11
            when nv.Department = N'Hồn Việt' then 12
            when nv.Department = N'PROCI' then 13
            when nv.Department = N'KHÁNH HỘI' then 14
            when nv.Department = N'ZEN phục vụ' then 15
            when nv.Department = N'ZEN Quầy Nước' then 16
            when nv.Department = N'NH ZEN Tạp vụ' then 17
            when nv.Department = N'ZEN Bếp' then 18
            when nv.Department = N'Zen Maketing' then 19
            when nv.Department = N'Zen Thu Mua' then 20
            else nv.Department end asc"));
        
        $date = $nextDay->day."-".$nextDay->month."-".$nextDay->year;
        Excel::create('SuatAn_'.$date,function($excel) use($data, $nextDay){
            $excel->sheet('Suất Ăn',function($sheet) use($data, $nextDay){
                $sheet->mergeCells('A1:E1');
                $sheet->row(1, function ($row) {
                    $row->setFontSize(30);
                    $row->setFontWeight('bold');
                    $row->setValignment('center');
                    $row->setAlignment('center');
                });
                $sheet->row(1,array('ĐĂNG KÝ SUẤT ĂN'));
                $sheet->mergeCells('A2:E2');
                $sheet->row(2, function ($row) {
                    $row->setFontSize(13);
                    $row->setFontWeight('bold');
                    $row->setValignment('center');
                    $row->setAlignment('center');
                });
                $sheet->row(2,array('Ngày '.$nextDay->day.' Tháng '.$nextDay->month.' Năm'.$nextDay->year));
                $sheet->row(3, function ($row) {
                    $row->setFontWeight('bold');
                    $row->setValignment('center');
                    $row->setAlignment('center');
                });
                $sheet->row(3,array('STT', 'Họ & Tên', 'Bộ Phận', 'Món' ,'Ký Nhận')); 
                $i = 1;      
                for($i; $i<=sizeof($data);$i++){
                    $sheet->row($i+3,array($i, $data[$i-1]->Name, $data[$i-1]->Department, $data[$i-1]->Type ,''));
                    $sheet->setBorder('A3:E'.($i+3), 'thin');
                }
            });
        })->export('xlsx');
    }

    public function checkNotRegis(){
        $today = Carbon::now();
        if($today->dayOfWeek == 5){
            $nextDay = $today->addDay(3);
        }else if($today->dayOfWeek == 6){
            $nextDay = $today->addDay(2);
        }else {
            $nextDay = $today->addDay(1);
        }
        $data = \DB::select(\DB::raw("select Department from NVDKAn where Staff_ID not in (select Staff_ID from DangKiSuatAn where Date = '$nextDay') group by Department"));
        return $data;
    }
}
