<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QLKhoModel;
use Illuminate\Support\Facades\Redirect;
use Auth;
class QLKhoController extends Controller
{

    public function index(Request $Request){
    		$data = QLKhoModel::get()->where('Bophan',"Khotong")->where("Sl",'>=',1);
    		$csvc = QLKhoModel::get()->where('Bophan',"CSVC")->where("Sl",'>=',1);
            $thuongmai = QLKhoModel::get()->where('Bophan',"Thuongmai")->where("Sl",'>=',1);
           
    		return view('QLKho.QLKho')->with([
    				'data'=>$data,
    				'bophan'=>$csvc,
                    'thuongmai'=>$thuongmai,
    		]);
    }
    public function getDetail(Request $Request){
            $show = QLKhoModel::where('MVT',$Request->id)->get()->first();
            $count = QLKhoModel::get()->where('MVT',$Request->id)->sum('Sl');
            $countdetail = QLKhoModel::where('MVT',$Request->id)->get();
    		return view('QLKho.Showdetail')->with([
                'key' => $show,
                'count' => $count,
                'countdetail'=> $countdetail,
            ]);
    }
    public function MoveEdit(Request $Request){
       $Bophan = $Request ->Bophan;
       $MVT = $Request->MVT;
       $Sl = $Request->Sl;
       $Bophanchuyen = $Request->Bophanchuyen;
      
        $condition = \DB::table('qlkho')->where("Bophan",$Bophan)->where('MVT',$MVT)->where("Sl",">=",0)->get()->first();
        $conditionsl  = \DB::table('qlkho')->where("Bophan",$Bophanchuyen)->where('MVT',$MVT)->sum('Sl');
     if ($Sl > $conditionsl || $Sl < 0)
        return redirect()->back()->with('message', 'Sai số lượng');
          if ($condition->Ten != null){
            \DB::table('qlkho')->where(['MVT'=>$MVT,
                                         'Bophan'=>$Bophan])->increment('Sl',$Sl);
              \DB::table('qlkho')->where(['MVT'=>$MVT,
                                         'Bophan'=>$Bophanchuyen])->decrement('Sl',$Sl);

               $show = $condition->Ten;
        }

        return $show;
    }
    public function addProduct(Request $Request){
        $MVT = $Request->input('MVT');
        $MTB = $Request->input('MTB');
        $Ten = $Request->input('Ten');
        $TSKT = $Request->input('TSKT');
        $Sl = $Request->input('sl');
        $dvt = $Request->input('dvt');
        $ghichu = $Request->input('ghichu');
        $SLC = $Request->input('SLC');
        $Bophannhan = $Request->input('BPN');
        if ($Request->hasFile('hinhanh'))
           $file = $Request->hinhanh;
        $tenhinh = $file->getClientOriginalName();
        $duoifile = $file->getClientOriginalExtension();
        $kiemtraMVT = \DB::table('qlkho')->where('MVT',$MVT)->where('Bophan','Khotong')->get()->first();  
        $listPB = array('Khotong','CSVC','Thuongmai');
        $Congty = $Request->input('Congty');
        $Trangthai = $Request->input('TT');
        $Nguoiphutrach = $Request->input('NPT');
        $Ngaytra = $Request->input('Ngaytra');

          // KIỂM TRA MÃ 
         






 $i = 0 ;

          //BẮT ĐẦU NHẬP
        if($duoifile == "jpg" || $duoifile == "jpeg" || $duoifile == "png" || $duoifile =="JPG"){
                $file -> move('layouts/images/QLKho',$tenhinh);
                if ($SLC != null){
                  
                  $Sl = $Sl - $SLC ;
                 
                  if ($Sl <0)
                    return redirect()->back()->with('error','Lỗi');
                  for($i ; $i < sizeof($listPB) ; $i++){

                  
                     $nhap = new QLKhoModel;
                         $nhap->MVT = $MVT;
                         $nhap->Ten = $Ten;
                         $nhap->Thongso = $TSKT;
                         $nhap->DVT = $dvt;
                         $nhap->Ghichu = $ghichu;
                         $nhap->Ngaynhan = now();
                         $nhap->Hinh = $tenhinh;
                           $nhap->Congty = $Congty;
                     if($listPB[$i] === 'Khotong'){
                          $nhap->Sl = $Sl;
                        
                          $nhap->Bophan = $listPB[$i];
                          $nhap->Trangthai = 0;
                          $nhap->Nguoiphutrach = Auth::user()->name;
                          $nhap->save();
                        } 
                    else{
                       if($listPB[$i] === $Bophannhan){
                              $nhap->Bophan = $Bophannhan;
                               $nhap->Sl = $SLC;                     
                                $nhap->Nguoiphutrach = $Nguoiphutrach;
                                  $nhap->Trangthai = $Trangthai;
                              if($Trangthai == 0)
                                $nhap->Ngaytra = null;
                              else
                                $nhap->Ngaytra = $Ngaytra;
                               $nhap->save();
                            
                           }
                         
                         else{

                            $nhap->Sl = 0;
                              $nhap->Trangthai = 0;
                            $nhap->Bophan = $listPB[$i];
                             $nhap->save();
                           }
                       
                        }
                  }
                }
                for($i ; $i < sizeof($listPB) ; $i++){

                  
                     $nhap = new QLKhoModel;
                         $nhap->MVT = $MVT;
                         $nhap->Ten = $Ten;
                         $nhap->Thongso = $TSKT;
                         $nhap->DVT = $dvt;
                         $nhap->Ghichu = $ghichu;
                         $nhap->Ngaynhan = now();
                         $nhap->Hinh = $tenhinh;
                         $nhap->Congty = $Congty;
                     if($listPB[$i] === 'Khotong'){
                          $nhap->Sl = $Sl;
                        
                          $nhap->Bophan = $listPB[$i];
                          $nhap->
                          $nhap->save();
                        } 
                        else{

                            $nhap->Sl = 0;
                            $nhap->Bophan = $listPB[$i];
                             $nhap->save();
                           }
                         }
    
         }  
      return Redirect::to('QLKho');

    } 
    public function danhsachtong(){
      $tong =QLKhoModel::get()->where('Bophan',"Khotong")->where("Sl",'>=',1);
    
      return view('QLKho.danhsach')->with([
          'tong'=>$tong,
         
      ]);
    }
    public function SearchDetail(Request $Request){
  $data =\DB::table('qlkho')->where('Ten','like','%'.$Request->Ten.'%')->where('Bophan','Khotong')->get();
      return view('QLKho.SearchDetail')->with([
        'data'=> $data,
      ]);
    }

    public function ShowDetailPublic(){
      $data = \DB::table('qlkho')->where('Sl','>=',1)->get();
      return view('QLKho.QLKhoPublic')->with(['data'=>$data]);
    }
}
