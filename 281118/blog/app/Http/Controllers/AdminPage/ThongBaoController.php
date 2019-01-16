<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\CustomerProvider\SoTrungThuongModel;
use App\CustomerProvider\TaiSanPhongBanModel;
use Carbon\Carbon;

use App\Events\CustomerProvider\Redis;
class ThongBaoController extends Controller
{
    public function getRe(){
       
          date_default_timezone_set("Asia/Ho_Chi_Minh");
          $Ngaybatdau = Carbon::create(2018,10,13,11,0,0);
        $Ky = \DB::table('sotrungthuong')->orderBy('Ki','DESC')->get()->first();
        $Tinhngay = $Ky->Ki * 7 ;

        $Ngayxo = $Ngaybatdau->modify('+'.$Tinhngay.' day');

       ThongBaoController::CreateKy($Ngayxo);
        $Demnguoichon = \DB::select(\DB::raw('SELECT Sochon, SUM(Bang.Dem) as Dem FROM(SElect Sochon as Sochon,Dem as Dem from LAN1 WHERE Ngayxo =\''.$Ngayxo.'\' UNION ALL SELECT Sochon as Sochon,Dem as Dem FROm LAN2 WHERE Ngayxo=\''.$Ngayxo.'\' UNION ALL SELECT Sochon as Sochon,Dem as Dem FROm LAN3 WHERE Ngayxo=\''.$Ngayxo.'\') as Bang group by Bang.Sochon order by Bang.Sochon ASC'));
        // dd($Demnguoichon);
          $Sodcchon = \DB::table('sotrungthuong')->where('Ngay',$Ngayxo)->get()->first();
          $Giaidacbiet =\DB::select(\DB::raw('SELECT * FROM quaysotrungthuong,sotrungthuong WHERE (quaysotrungthuong.Lan1 = sotrungthuong.Solan1 or quaysotrungthuong.Lan2 = sotrungthuong.Solan1 or quaysotrungthuong.Lan3 = sotrungthuong.Solan1) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan2 or quaysotrungthuong.Lan2 = sotrungthuong.Solan2 or quaysotrungthuong.Lan3 = sotrungthuong.Solan2) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan3 or quaysotrungthuong.Lan2 = sotrungthuong.Solan3 or quaysotrungthuong.Lan3 = sotrungthuong.Solan3) AND quaysotrungthuong.Ngayxo =\''.$Ngayxo.'\' AND quaysotrungthuong.Ngayxo = sotrungthuong.Ngay'));
          $Giaikhuyenkhich = \DB::select(\DB::raw('select Hoten,Lan1,Lan2,Lan3 from quaysotrungthuong,sotrungthuong where 
quaysotrungthuong.Lan3  = sotrungthuong.Solan3 and quaysotrungthuong.Ngayxo = \''.$Ngayxo.'\'
and sotrungthuong.Ngay  = quaysotrungthuong.Ngayxo'));
      
           $Lichsu1 =\DB::select(\DB::raw('SELECT * FROM quaysotrungthuong,sotrungthuong WHERE (quaysotrungthuong.Lan1 = sotrungthuong.Solan1 or quaysotrungthuong.Lan2 = sotrungthuong.Solan1 or quaysotrungthuong.Lan3 = sotrungthuong.Solan1) and quaysotrungthuong.Ngayxo =\''.$Ngayxo.'\' AND quaysotrungthuong.Ngayxo = sotrungthuong.Ngay'));
          $Lichsu2 =\DB::select(\DB::raw('SELECT * FROM quaysotrungthuong,sotrungthuong WHERE (quaysotrungthuong.Lan1 = sotrungthuong.Solan1 or quaysotrungthuong.Lan2 = sotrungthuong.Solan1 or quaysotrungthuong.Lan3 = sotrungthuong.Solan1) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan2 or quaysotrungthuong.Lan2 = sotrungthuong.Solan2 or quaysotrungthuong.Lan3 = sotrungthuong.Solan2) AND quaysotrungthuong.Ngayxo =\''.$Ngayxo.'\' AND quaysotrungthuong.Ngayxo = sotrungthuong.Ngay'));
          
         ini_set('memory_limit','256M');
  //  \DB::statement('UPDATE quaysotrungthuong,sotrungthuong SET Trangthaidb=1 WHERE quaysotrungthuong.Lan1 = sotrungthuong.Solan1 AND quaysotrungthuong.Lan2 = sotrungthuong.Solan2 AND quaysotrungthuong.Lan3 = sotrungthuong.Solan3 AND sotrungthuong.Ngay = quaysotrungthuong.Ngayxo');

  // $countGiaiDB = \DB::table('quaysotrungthuong')->join('sotrungthuong','sotrungthuong.Ngay','=','quaysotrungthuong.Ngayxo')->select(\DB::raw('count(quaysotrungthuong.Trangthaidb) as Sogiaidb, quaysotrungthuong.Ngayxo'))->where('quaysotrungthuong.Trangthaidb',1)->groupBy('quaysotrungthuong.Ngayxo')->orderBy('quaysotrungthuong.Ngayxo','DESC')->get()->first();
 
  // \DB::Table('sotrungthuong')->where('Ngay',$countGiaiDB->Ngayxo)->update(['Trungdb'=>$countGiaiDB->Sogiaidb]);

          // \DB::statement('SELECT * FROM quaysotrungthuong,sotrungthuong WHERE (quaysotrungthuong.Lan1 = sotrungthuong.Solan1 or quaysotrungthuong.Lan2 = sotrungthuong.Solan1 or quaysotrungthuong.Lan3 = sotrungthuong.Solan1) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan2 or quaysotrungthuong.Lan2 = sotrungthuong.Solan2 or quaysotrungthuong.Lan3 = sotrungthuong.Solan2) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan3 or quaysotrungthuong.Lan2 = sotrungthuong.Solan3 or quaysotrungthuong.Lan3 = sotrungthuong.Solan3) AND sotrungthuong.Ngay =\''.$Ngayxo.'\'');
\DB::statement('UPDATE quaysotrungthuong SET Trangthaidb=1 FROM quaysotrungthuong,sotrungthuong WHERE quaysotrungthuong.Lan1 = sotrungthuong.Solan1 AND quaysotrungthuong.Lan2 = sotrungthuong.Solan2 AND quaysotrungthuong.Lan3 = sotrungthuong.Solan3 AND sotrungthuong.Ngay = quaysotrungthuong.Ngayxo');

  $countGiaiDB = \DB::table('quaysotrungthuong')->join('sotrungthuong','sotrungthuong.Ngay','=','quaysotrungthuong.Ngayxo')->select(\DB::raw('count(quaysotrungthuong.Trangthaidb) as Sogiaidb, quaysotrungthuong.Ngayxo'))->where('quaysotrungthuong.Trangthaidb',1)->groupBy('quaysotrungthuong.Ngayxo')->orderBy('quaysotrungthuong.Ngayxo','DESC')->get()->first();

if(!empty($countGiaiDB))
  {\DB::Table('sotrungthuong')->where('Ngay',$countGiaiDB->Ngayxo)->update(['Trungdb'=>$countGiaiDB->Sogiaidb]);
}
        return view('test.quayso')->with(['Sodcchon'=>$Sodcchon,
                                            'Giaidacbiet'=>$Giaidacbiet,                                           
                                            'Giaikhuyenkhich'=>$Giaikhuyenkhich,
                                            'Demnguoichon'=>$Demnguoichon,
                                            'Lichsu1'=>$Lichsu1,
                                            'Lichsu2'=>$Lichsu2,
                                            ]);

    }
    public function postRe(Request $Request){
        
            // $add =  SoTrungThuongModel::find(today());
            // $add->Solan2 = 3;
            // $add->save();
            // event(
            //  $t = new Redis($add)
            // );

            // // $redis = Redis::connection();
            // // $redis->publish('getRe','Ok');
            // return 'Ok';
    }
    public function Refesh(){
        // $Sodcchon = \DB::table('sotrungthuong')->where('Ngay',today())->get();

        // return view('test.test')->with(['Sodcchon'=>$Sodcchon]);
    }
    public function Nguoidacbiet(Request $Request){
        $Ngaybatdau = Carbon::create(2018,10,13,11,0,0);
        $Ky = \DB::table('sotrungthuong')->orderBy('Ki','DESC')->get()->first();
        $Tinhngay = $Ky->Ki * 7 ;

        $Ngayxo = $Ngaybatdau->modify('+'.$Tinhngay.' day');
        if($Request->Solan == 1){
            $Dacbiet = \DB::select(\DB::raw('SELECT * FROM quaysotrungthuong,sotrungthuong WHERE quaysotrungthuong.Lan1 = sotrungthuong.Solan1 or quaysotrungthuong.Lan2 = sotrungthuong.Solan1 or quaysotrungthuong.Lan3 = sotrungthuong.Solan1 AND sotrungthuong.Ngay =\''.$Ngayxo.'\''));
        }elseif($Request->Solan == 2)
        {

            $Dacbiet = \DB::select(\DB::raw('SELECT * FROM quaysotrungthuong,sotrungthuong WHERE (quaysotrungthuong.Lan1 = sotrungthuong.Solan1 or quaysotrungthuong.Lan2 = sotrungthuong.Solan1 or quaysotrungthuong.Lan3 = sotrungthuong.Solan1) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan2 or quaysotrungthuong.Lan2 = sotrungthuong.Solan2 or quaysotrungthuong.Lan3 = sotrungthuong.Solan2) AND sotrungthuong.Ngay =\''.$Ngayxo.'\''));
        
        }
        else
        {
              $Dacbiet = \DB::select(\DB::raw('SELECT * FROM quaysotrungthuong,sotrungthuong WHERE (quaysotrungthuong.Lan1 = sotrungthuong.Solan1 or quaysotrungthuong.Lan2 = sotrungthuong.Solan1 or quaysotrungthuong.Lan3 = sotrungthuong.Solan1) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan2 or quaysotrungthuong.Lan2 = sotrungthuong.Solan2 or quaysotrungthuong.Lan3 = sotrungthuong.Solan2) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan3 or quaysotrungthuong.Lan2 = sotrungthuong.Solan3 or quaysotrungthuong.Lan3 = sotrungthuong.Solan3) AND sotrungthuong.Ngay =\''.$Ngayxo.'\''));

               \DB::statement('UPDATE quaysotrungthuong SET Trangthaidb=1 FROM quaysotrungthuong,sotrungthuong WHERE quaysotrungthuong.Lan1 = sotrungthuong.Solan1 AND quaysotrungthuong.Lan2 = sotrungthuong.Solan2 AND quaysotrungthuong.Lan3 = sotrungthuong.Solan3 AND sotrungthuong.Ngay = quaysotrungthuong.Ngayxo');

  $countGiaiDB = \DB::table('quaysotrungthuong')->join('sotrungthuong','sotrungthuong.Ngay','=','quaysotrungthuong.Ngayxo')->select(\DB::raw('count(quaysotrungthuong.Trangthaidb) as Sogiaidb, quaysotrungthuong.Ngayxo'))->where('quaysotrungthuong.Trangthaidb',1)->groupBy('quaysotrungthuong.Ngayxo')->orderBy('quaysotrungthuong.Ngayxo','DESC')->get()->first();
  
  \DB::Table('sotrungthuong')->where('Ngay',$countGiaiDB->Ngayxo)->update(['Trungdb'=>$countGiaiDB->Sogiaidb]);
           
        }

        return view('test.Nguoidb',compact('Dacbiet'));
    }
    public function CreateKy($Ngayxo){
         date_default_timezone_set("Asia/Ho_Chi_Minh");
        $now = Carbon::now();
        $condition = $now->modify('-1 day');
        if($condition >= $Ngayxo){
         
            $nextKi = \DB::table('sotrungthuong')->orderBy('Ki','DESC')->get()->first();
            $Ngayxottstring = new Carbon($nextKi->Ngay);
            if($nextKi->Trungdb >= 1)
            {       
            
                    $Ngayxott = $Ngayxottstring->modify('+7 day');
                    $create = new SoTrungThuongModel;
                    $create->Ki = ++$nextKi->Ki;
                    $create->Ngay = $Ngayxott;
                    $create->Giaithuongdb = 3500000;
                    $create->Trungdb = 0;
                    $create->Trungkk = 0;
                    $create->save();
            }
            else
            {
                
                      $Ngayxott = $Ngayxottstring->modify('+7 day');
                    $create = new SoTrungThuongModel;
                    $create->Ki = ++$nextKi->Ki;
                    $create->Ngay = $Ngayxott;
                    $create->Giaithuongdb = $nextKi->Giaithuongdb + 1500000;
                    $create->Trungdb = 0;
                    $create->Trungkk = 0;
                    $create->save();
            }
        }
    }
    public function preQS(Request $Request){
      $Ky = $Request->Ki;
     
       date_default_timezone_set("Asia/Ho_Chi_Minh");
          $Ngaybatdau = Carbon::create(2018,10,13,11,0,0);
       
        $Tinhngay = --$Ky * 7 ;

        $Ngayxo = $Ngaybatdau->modify('+'.$Tinhngay.' day');
          $Sodcchon = \DB::table('sotrungthuong')->where('Ngay',$Ngayxo)->get()->first();
         
          $Giaidacbiet =\DB::select(\DB::raw('SELECT * FROM quaysotrungthuong,sotrungthuong WHERE (quaysotrungthuong.Lan1 = sotrungthuong.Solan1 or quaysotrungthuong.Lan2 = sotrungthuong.Solan1 or quaysotrungthuong.Lan3 = sotrungthuong.Solan1) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan2 or quaysotrungthuong.Lan2 = sotrungthuong.Solan2 or quaysotrungthuong.Lan3 = sotrungthuong.Solan2) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan3 or quaysotrungthuong.Lan2 = sotrungthuong.Solan3 or quaysotrungthuong.Lan3 = sotrungthuong.Solan3) AND quaysotrungthuong.Ngayxo =\''.$Ngayxo.'\' AND quaysotrungthuong.Ngayxo = sotrungthuong.Ngay'));
            $Giaikhuyenkhich = \DB::select(\DB::raw('select Hoten,Lan1,Lan2,Lan3 from quaysotrungthuong,sotrungthuong where 
          quaysotrungthuong.Lan3  = sotrungthuong.Solan3 and quaysotrungthuong.Ngayxo = \''.$Ngayxo.'\'
          and sotrungthuong.Ngay  = quaysotrungthuong.Ngayxo'));
              
           $Lichsu1 =\DB::select(\DB::raw('SELECT * FROM quaysotrungthuong,sotrungthuong WHERE (quaysotrungthuong.Lan1 = sotrungthuong.Solan1 or quaysotrungthuong.Lan2 = sotrungthuong.Solan1 or quaysotrungthuong.Lan3 = sotrungthuong.Solan1) and quaysotrungthuong.Ngayxo =\''.$Ngayxo.'\' AND quaysotrungthuong.Ngayxo = sotrungthuong.Ngay'));
          $Lichsu2 =\DB::select(\DB::raw('SELECT * FROM quaysotrungthuong,sotrungthuong WHERE (quaysotrungthuong.Lan1 = sotrungthuong.Solan1 or quaysotrungthuong.Lan2 = sotrungthuong.Solan1 or quaysotrungthuong.Lan3 = sotrungthuong.Solan1) AND (quaysotrungthuong.Lan1 = sotrungthuong.Solan2 or quaysotrungthuong.Lan2 = sotrungthuong.Solan2 or quaysotrungthuong.Lan3 = sotrungthuong.Solan2) AND quaysotrungthuong.Ngayxo =\''.$Ngayxo.'\' AND quaysotrungthuong.Ngayxo = sotrungthuong.Ngay'));
          

      return view('test.history')->with(['Sodcchon'=>$Sodcchon,
                                            'Giaidacbiet'=>$Giaidacbiet,                                 
                                            'Giaikhuyenkhich'=>$Giaikhuyenkhich,                                          
                                            'Lichsu1'=>$Lichsu1,
                                            'Lichsu2'=>$Lichsu2,
                                            ]);
    }
}
