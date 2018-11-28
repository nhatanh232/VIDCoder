<?php

namespace App\Http\Controllers;
// use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Excel, Input , File;
use phpoffice\phpspreadsheet;
Use App\DSNVDKA;


class ExcelController extends Controller
{
    public function export(Request $Request){
    	// Tuần 1
$export1 = \DB::table('DSNVDKA')->Select()->Where('Thu2','Chay')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export2 = \DB::table('DSNVDKA')->Select()->Where('Thu2','Mặn')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export3 =	\DB::table('DSNVDKA')->Select()->Where('Thu2','Nghỉ')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export13 = \DB::table('DSNVDKA')->Select()->Where('Thu3','Chay')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export23 =	\DB::table('DSNVDKA')->Select()->Where('Thu3','Mặn')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export33 = \DB::table('DSNVDKA')->Select()->Where('Thu3','Nghỉ')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export14 = \DB::table('DSNVDKA')->Select()->Where('Thu4','Chay')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export24 =	\DB::table('DSNVDKA')->Select()->Where('Thu4','Mặn')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export34 = \DB::table('DSNVDKA')->Select()->Where('Thu4','Nghỉ')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export15 = \DB::table('DSNVDKA')->Select()->Where('Thu5','Chay')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export25 =	\DB::table('DSNVDKA')->Select()->Where('Thu5','Mặn')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export35 = \DB::table('DSNVDKA')->Select()->Where('Thu5','Nghỉ')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export16 = \DB::table('DSNVDKA')->Select()->Where('Thu6','Chay')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export26 =	\DB::table('DSNVDKA')->Select()->Where('Thu6','Mặn')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
$export36 = \DB::table('DSNVDKA')->Select()->Where('Thu6','Nghỉ')->where("Tuan",1)->Where("Thang",$Request->Thang)->count();
// Tuần 2
$export211 = \DB::table('DSNVDKA')->Select()->Where('Thu2','Chay')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export221 = \DB::table('DSNVDKA')->Select()->Where('Thu2','Mặn')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export231 =	\DB::table('DSNVDKA')->Select()->Where('Thu2','Nghỉ')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export213 = \DB::table('DSNVDKA')->Select()->Where('Thu3','Chay')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export223 =	\DB::table('DSNVDKA')->Select()->Where('Thu3','Mặn')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export233 = \DB::table('DSNVDKA')->Select()->Where('Thu3','Nghỉ')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export214 = \DB::table('DSNVDKA')->Select()->Where('Thu4','Chay')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export224 =	\DB::table('DSNVDKA')->Select()->Where('Thu4','Mặn')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export234 = \DB::table('DSNVDKA')->Select()->Where('Thu4','Nghỉ')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export215 = \DB::table('DSNVDKA')->Select()->Where('Thu5','Chay')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export225 =	\DB::table('DSNVDKA')->Select()->Where('Thu5','Mặn')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export235 = \DB::table('DSNVDKA')->Select()->Where('Thu5','Nghỉ')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export216 = \DB::table('DSNVDKA')->Select()->Where('Thu6','Chay')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export226 =	\DB::table('DSNVDKA')->Select()->Where('Thu6','Mặn')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
$export236 = \DB::table('DSNVDKA')->Select()->Where('Thu6','Nghỉ')->where("Tuan",2)->Where("Thang",$Request->Thang)->count();
// // Tuần 3
$export311 = \DB::table('DSNVDKA')->Select()->Where('Thu2','Chay')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export321 = \DB::table('DSNVDKA')->Select()->Where('Thu2','Mặn')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export331 =	\DB::table('DSNVDKA')->Select()->Where('Thu2','Nghỉ')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export313 = \DB::table('DSNVDKA')->Select()->Where('Thu3','Chay')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export323 =	\DB::table('DSNVDKA')->Select()->Where('Thu3','Mặn')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export333 = \DB::table('DSNVDKA')->Select()->Where('Thu3','Nghỉ')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export314 = \DB::table('DSNVDKA')->Select()->Where('Thu4','Chay')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export324 =	\DB::table('DSNVDKA')->Select()->Where('Thu4','Mặn')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export334 = \DB::table('DSNVDKA')->Select()->Where('Thu4','Nghỉ')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export315 = \DB::table('DSNVDKA')->Select()->Where('Thu5','Chay')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export325 =	\DB::table('DSNVDKA')->Select()->Where('Thu5','Mặn')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export335 = \DB::table('DSNVDKA')->Select()->Where('Thu5','Nghỉ')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export316 = \DB::table('DSNVDKA')->Select()->Where('Thu6','Chay')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export326 =	\DB::table('DSNVDKA')->Select()->Where('Thu6','Mặn')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
$export336 = \DB::table('DSNVDKA')->Select()->Where('Thu6','Nghỉ')->where("Tuan",3)->Where("Thang",$Request->Thang)->count();
// // Tuần 4 
$export411 = \DB::table('DSNVDKA')->Select()->Where('Thu2','Chay')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export421 = \DB::table('DSNVDKA')->Select()->Where('Thu2','Mặn')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export431 =	\DB::table('DSNVDKA')->Select()->Where('Thu2','Nghỉ')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export413 = \DB::table('DSNVDKA')->Select()->Where('Thu3','Chay')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export423 =	\DB::table('DSNVDKA')->Select()->Where('Thu3','Mặn')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export433 = \DB::table('DSNVDKA')->Select()->Where('Thu3','Nghỉ')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export414 = \DB::table('DSNVDKA')->Select()->Where('Thu4','Chay')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export424 =	\DB::table('DSNVDKA')->Select()->Where('Thu4','Mặn')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export434 = \DB::table('DSNVDKA')->Select()->Where('Thu4','Nghỉ')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export415 = \DB::table('DSNVDKA')->Select()->Where('Thu5','Chay')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export425 =	\DB::table('DSNVDKA')->Select()->Where('Thu5','Mặn')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export435 = \DB::table('DSNVDKA')->Select()->Where('Thu5','Nghỉ')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export416 = \DB::table('DSNVDKA')->Select()->Where('Thu6','Chay')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export426 =	\DB::table('DSNVDKA')->Select()->Where('Thu6','Mặn')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$export436 = \DB::table('DSNVDKA')->Select()->Where('Thu6','Nghỉ')->where("Tuan",4)->Where("Thang",$Request->Thang)->count();
$thang = $Request->Thang;
$tongthang = \DB::table('DSNVDKA')->Select('Manv')->Where('Thu2','Chay')->orWhere('Thu3','Chay')->orWhere('Thu4','Chay')->orWhere('Thu5','Chay')->orWhere('Thu6','Chay')->Where("Thang",$Request->Thang)->count();
		Excel::create('DSNVDKA THÁNG '.$thang, function($excel) use($export1,$export13,$export14,$export15,$export16,$export2,$export23,$export24,$export25,$export26,$export3,$export33,$export34,$export35,$export36,$thang,$tongthang,$export211,$export221,$export231,$export213,$export223,$export233,$export214,$export224,$export234,$export215,$export225,$export235,$export216,$export226,$export236,
			$export311,$export321,$export331,$export313,$export323,$export333,$export314,$export324,$export334,$export315,$export325,$export335,$export316,$export326,$export336,
			$export411,$export421,$export431,$export413,$export423,$export433,$export414,$export424,$export434,$export415,$export425,$export435,$export416,$export426,$export436
		){
			$excel -> sheet('Sheet 1', function($sheet) use($export1,$export13,$export14,$export15,$export16,$export2,$export23,$export24,$export25,$export26,$export3,$export33,$export34,$export35,$export36,$thang,$tongthang,$export211,$export221,$export231,$export213,$export223,$export233,$export214,$export224,$export234,$export215,$export225,$export235,$export216,$export226,$export236,$export311,$export321,$export331,$export313,$export323,$export333,$export314,$export324,$export334,$export315,$export325,$export335,$export316,$export326,$export336,$export411,$export421,$export431,$export413,$export423,$export433,$export414,$export424,$export434,$export415,$export425,$export435,$export416,$export426,$export436){
				$sheet -> fromArray(array(array("Tuần 1 Tháng ".$thang, "Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Tổng Tuần","Tổng tháng"),

								array("Tổng suất ăn chay:",$export1,$export13,$export14,$export15,$export16,null,$tongthang),
								array("Tổng suất ăn mặn:",$export2,$export23,$export24,$export25,$export26),
								array("Tổng suất ăn nghỉ:",$export3,$export33,$export34,$export35,$export36),
								array(" "),
								array("Tuần 2 Tháng ".$thang),

								array("Tổng suất ăn chay:",$export211,$export213,$export214,$export215,$export216),
								array("Tổng suất ăn mặn:",$export221,$export223,$export224,$export225,$export226),
								array("Tổng suất ăn nghỉ:",$export231,$export233,$export234,$export235,$export236),
								array(" "),
								array("Tuần 3 Tháng ".$thang),

								array("Tổng suất ăn chay:",$export311,$export313,$export314,$export315,$export316),
								array("Tổng suất ăn mặn:",$export321,$export323,$export324,$export325,$export326),
								array("Tổng suất ăn nghỉ:",$export331,$export333,$export334,$export335,$export336),
								array(" "),
								array("Tuần 4 Tháng ".$thang),

								array("Tổng suất ăn chay:",$export411,$export413,$export414,$export415,$export416),
								array("Tổng suất ăn mặn:",$export421,$export423,$export424,$export425,$export426),
								array("Tổng suất ăn nghỉ:",$export431,$export433,$export434,$export435,$export436),
			));
			});
		})->export('xlsx');
	}
	public function DSNVthang(Request $Request){
		$export = DSNVDKA::select("Manv","Hoten","Phongban","Congty","Thu2","Thu3","Thu4","Thu5","Thu6","Tuan","Startdate","Enddate")->Where("Thang",$Request->Thang)->orderBy("Hoten")->orderBy("Tuan")->get();
		$thang = $Request->Thang;
			Excel::create('DSNVDKA THÁNG '.$thang, function($excel) use ($export){
			$excel -> sheet('Sheet 1', function($sheet) use($export){
				$sheet -> fromArray($export);
			});
		})->export('xlsx');
		}
}
