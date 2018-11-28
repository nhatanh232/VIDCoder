<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongbaoModel;
use App\HoatDongModel;
use App\ThanhLyModel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {   $tintuc = ThongbaoModel::orderBy('Date')->take(4)->get();
        $hoatdong = HoatDongModel::orderBy('Ngay')->take(10)->get();
         $thanhly = ThanhLyModel::where('Trangthai',0)->paginate(5);
        return view('home')->with('tintuc',$tintuc)->with('hoatdong',$hoatdong)->with('thanhly',$thanhly);
    }
      public function Index()
    {
        return'Đăng ký thành công';
    }
     public function Thanhly(){
         $thanhly = ThanhLyModel::paginate(5);
         return view('thanhlygiatri')->with('thanhly',$thanhly);
    }
    public function KhoPublic(){
        $taisankho = \DB::table('khotong')->where('Sl','>=',1)->get();
        $taisanpb = \DB::table('tsphongban')->where('Sl','>=',1)->get(); 
        $test = \DB::select(\DB::raw('SELECT MVT,Bophan as Location,Ten,Bophan as Bophan,Congty, SUM(Sl) as Sl FROM khotong where Sl>=1 GROUP BY MVT,Ten,Congty,Bophan  UNION SELECT MVT,Location,Ten,Bophan,Congty,SUM(Sl) as Sl FROM tsphongban where Sl>=1 GROUP BY MVT,Ten,Bophan,Congty,Location'));
        // return view('KhoPublic.Tongtaisan')->with(['data1'=>$taisankho,'data2'=>$taisanpb]);

     return view('KhoPublic.Tongtaisan')->with(['data1'=>$test]);
    }
    public function detailTaisan(Request $Request){
            $data = \DB::select(\DB::raw("SELECT Hinh,Thongso,Sohopdong,Nguoimua FROM khotong where MVT=N'$Request->MVT'  UNION SELECT Hinh,Thongso,Sohopdong,Nguoimua FROM tsphongban where MVT=N'$Request->MVT'"));

        return view('KhoPublic.detailTaisan')->with('key',$data);
    }
}
