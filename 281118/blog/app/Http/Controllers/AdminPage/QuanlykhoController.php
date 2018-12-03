<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use App\CustomerProvider\QuanlykhoModel;
use App\CustomerProvider\TaiSanPhongBanModel;
use App\CustomerProvider\HistoryDCModel;
use App\CustomerProvider\HistoryNhapModel;
use Auth;
use Excel;
use PHPExcel_Worksheet_Drawing;
use PhpOffice\PhpWord\TemplateProcessor;
use  PhpOffice\PhpWord\Writer;
use App\CustomerProvider\LuuTruPhieuXNModel;
use Carbon\Carbon;
class QuanlykhoController extends Controller
{
    public function void_main(){

    }



    public function phieuxuat($pxk,$nguoinhan , $phongban , $lydo,$mvt , $mtb){
            $add = new LuuTruPhieuXNModel;
            $add->Sophieu = $pxk;
            $add->Nguoinhan = $nguoinhan;
            $add->Bophan = $phongban;
            $add->MVT = $mvt;
            $add->MTB = $mtb;
            $add->Lydoxuat = $lydo;
            $add->save();
    }
    public function ShowAdmin(){
        return view('Admin.AdminPage');
    }
    public function ShowKho(){
        $test= \DB::table('khotong')->select('id','MVT','MTB','Ten','Sl','Ghichu')->where('Sl','>=',1)->distinct('MVT')->get(); 
        $data= \DB::select(\DB::raw('SELECT MVT,Ten,Ghichu, SUM(Sl) as Sl FROM khotong WHERE Sl>=1 GROUP BY MVT,Ten,Ghichu Order by MVT DESC'));
    
        return view('Admin.ShowKho')->with('kho',$data);
    }
    public function TSPB(){
        // $data = TaiSanPhongBanModel::where('Sl','>=',1)->orderBy('created_at','DESC')->get();
       
        $data = \DB::select(\DB::raw('SELECT MVT,Ten,Nguoiphutrach,Bophan,Location, SUM(Sl) as Sl FROM tsphongban WHERE Sl>=1 GROUP BY MVT,Ten,Nguoiphutrach,Bophan,Location'));
        
        return view('Admin.TSPB')->with(["data"=>$data]);
    }
    public function Thuhoi(Request $Request){
            $MVT = $Request->MVT;
            $MTB = $Request->MTB;
            $Ngaynhapkho = $Request->Ngaythuhoi;
            $dataquery = \DB::table('tsphongban')->select('MVT','MTB','Ten','Thongso','Hinh','Hinh1','Hinh2','Hinh3','Congty','dvt','Ngaymua','Sohopdong','Nguoimua','Thoigianbh','Thoigiankh','Giatri','Ghichu','Nhacungcap','Thoigianbd','Ngaykiemke') ->where(["MVT"=> $MVT,
            'MTB'=>$MTB,
    ])->get() ;
       
            $Kho = new QuanlykhoModel;
            $Kho->MVT = $dataquery[0]->MVT;
            $Kho->MTB = $dataquery[0]->MTB;
            $Kho->Ten = $dataquery[0]->Ten;
            $Kho->Thongso = $dataquery[0]->Thongso;
            $Kho->Hinh = $dataquery[0]->Hinh;
            $Kho->Hinh1 = $dataquery[0]->Hinh1;
            $Kho->Hinh2 = $dataquery[0]->Hinh2;
            $Kho->Hinh3 = $dataquery[0]->Hinh3;
            $Kho->Ngaynhap = $Ngaynhapkho;
            $Kho->Nguoiphutrach =  Auth::user()->name;
            $Kho->Congty = $dataquery[0]->Congty;
            $Kho->Sl = 1;
            $Kho->dvt = $dataquery[0]->dvt;
            $Kho->Ngaymua = $dataquery[0]->Ngaymua;
            $Kho->Sohopdong = $dataquery[0]->Sohopdong;
            $Kho->Nguoimua = $dataquery[0]->Nguoimua;
            $Kho->Thoigianbh = $dataquery[0]->Thoigianbh;
            $Kho->Thoigiankh = $dataquery[0]->Thoigiankh;
             $Kho->Thoigianbd = $dataquery[0]->Thoigianbd;
             $Kho->Ngaykiemke = $dataquery[0]->Ngaykiemke;
              $Kho->Giatri = $dataquery[0]->Giatri;
                $Kho->Ghichu = $dataquery[0]->Ghichu;
                  $Kho->Nhacungcap = $dataquery[0]->Nhacungcap;
                $Kho->Bophan = "Kho";
            $Kho->Trangthai = 1;

            $Kho->save();
        \DB::table('tsphongban')->where(["MVT"=> $MVT,
            'MTB'=>$MTB,
    ])->delete();
            $historydc = new HistoryDCModel;
            $historydc->MVT = $MVT;
            $historydc->MTB = $MTB;
            $historydc->History = 'Kho';
            $historydc->Nguoiphutrach = Auth::user()->name;
            $historydc->Ngaychuyen = $Ngaynhapkho;
            $historydc->Location = "Kho";
            $historydc->Trangthai = 1;
            $historydc->Nguoithuchien = Auth::user()->name;
            $historydc->save();
        
        return back();
    }
    public function Dieuchuyen(Request $Request){
        $MVT = $Request->MVT;
        $MTB = $Request->MTB;
        $Ngaychuyen = $Request->Ngaychuyen;
        $Bophan = $Request->Bophannhan;
        $Nguoiphutrach = $Request->NguoiphutrachBP;
        
            $kthis = \DB::table('historydc')->where(['MVT'=>$MVT, 'MTB'=>$MTB])->get()->first();
            if($kthis->MTB != null){
                $noichuyen =  \DB::table('historydc')->where('MVT',$MVT)->where('MTB',$MTB)->select('History')->get()->first();
                $Hisbophan = $noichuyen->History.'->'.$Bophan.'/'.$Ngaychuyen.'/'.$Nguoiphutrach;
                \DB::table('historydc')->where('MVT',$MVT)->where('MTB',$MTB)->update(['History'=>$Hisbophan]);
                \DB::table('tsphongban')->where('MVT',$MVT)->where('MTB',$MTB)->update(['Bophan'=>$Bophan,'Ngaynhan'=>$Ngaychuyen,'Nguoiphutrach'=>$Nguoiphutrach]);
            }
            
        return back();
    }
    public function Dieuchuyensll(Request $Request){
        if($Request->has('thuhoi')){

            $iddc = $Request->iddc;
             for ($i = 0 ; $i < sizeof($iddc) ; $i++){
        $dataquery = \DB::table('tsphongban')->select('MVT','MTB','Ten','Thongso','Hinh','Hinh1','Hinh2','Hinh3','Congty','dvt','Ngaymua','Sohopdong','Nguoimua','Thoigianbh','Thoigiankh','Giatri','Ghichu','Nhacungcap','Luuy','Thoigianbd','Ngaykiemke')->where('id',$iddc[$i])->get(); 

            $Kho = new QuanlykhoModel;
            $Kho->MVT = $dataquery[0]->MVT;
            $Kho->MTB = $dataquery[0]->MTB;
            $Kho->Ten = $dataquery[0]->Ten;
            $Kho->Thongso = $dataquery[0]->Thongso;
            $Kho->Hinh = $dataquery[0]->Hinh;
            $Kho->Hinh1 = $dataquery[0]->Hinh1;
            $Kho->Hinh2 = $dataquery[0]->Hinh2;
            $Kho->Hinh3 = $dataquery[0]->Hinh3;
            $Kho->Ngaynhap = now();
            $Kho->Nguoiphutrach =  Auth::user()->name;
            $Kho->Congty = $dataquery[0]->Congty;
            $Kho->Sl = 1;
            $Kho->dvt = $dataquery[0]->dvt;
            $Kho->Ngaymua = $dataquery[0]->Ngaymua;
            $Kho->Sohopdong = $dataquery[0]->Sohopdong;
            $Kho->Nguoimua = $dataquery[0]->Nguoimua;
            $Kho->Thoigianbh = $dataquery[0]->Thoigianbh;
            $Kho->Thoigiankh = $dataquery[0]->Thoigiankh;
            $Kho->Thoigianbd = $dataquery[0]->Thoigianbd;
             $Kho->Ngaykiemke = $dataquery[0]->Ngaykiemke;
              $Kho->Giatri = $dataquery[0]->Giatri;
                $Kho->Ghichu = $dataquery[0]->Ghichu;
                  $Kho->Nhacungcap = $dataquery[0]->Nhacungcap;
                  $Kho->Luuy = $dataquery[0]->Luuy;
    
            $Kho->Trangthai = 1;
            $Kho->save();
        \DB::table('tsphongban')->where(["MVT"=>$dataquery[0]->MVT,
            'MTB'=>$dataquery[0]->MTB,
    ])->delete();
            $historydc = new HistoryDCModel;
            $historydc->MVT = $dataquery[0]->MVT;
            $historydc->MTB =$dataquery[0]->MTB;
            $historydc->History = "Kho";
            $historydc->Nguoiphutrach = Auth::user()->name;
            $historydc->Ngaychuyen = now();
            $historydc->Location = "Kho";
            $historydc->Trangthai = 1;
            $historydc->Nguoithuchien = Auth::user()->name;
            $historydc->save();
         }
        }else{
        $Bophandieuchuyen = $Request->Bophannhan;
        $Ngaynhan = $Request->Ngaydieuchuyen;
        $NguoiphutrachBP = $Request->NguoiphutrachBP2;
        $iddc = $Request->iddc;
        $locat = $Request->location2;
       
        for ($i = 0 ; $i < sizeof($iddc) ; $i++){
            $queryall = \DB::table('tsphongban')->where('id',$iddc[$i])->select('MVT','MTB')->get()->first();

           $historydc = new HistoryDCModel;
           $historydc->MVT = $queryall->MVT;
           $historydc->MTB = $queryall->MTB;
           $historydc->History = $Bophandieuchuyen;
           $historydc->Ngaychuyen = $Ngaynhan;
           $historydc->Nguoiphutrach = $NguoiphutrachBP;
           $historydc->Location = $locat;
           $historydc->Trangthai = 1;
           $historydc->Nguoithuchien = Auth::user()->name;
           $historydc->save();
           \DB::table('tsphongban')->where(['MVT'=>$queryall->MVT,'MTB'=>$queryall->MTB])->update(['Nguoiphutrach'=>$NguoiphutrachBP,
            'Ngaynhan'=>$Ngaynhan,'Bophan'=>$Bophandieuchuyen,'Nguoiphutrach'=>$NguoiphutrachBP,'Location'=>$locat,'Trangthai'=>1,'Nguoithuchien'=>Auth::user()->name
       ]);
            
        }
        }
        return back();
    }
    public function NhapKho(Request $Request){
        $bol=null;
        $Ghichu = $Request->Ghichu;
        $MVTtontai = \DB::table('khotong')->where('MVT',$Request->MVT)->get()->first();
      $Nhacungcap = $Request->Nhacungcap;
    
      // if($Request->has('Ngaymua')){
      // $Ngaymua = new Carbon($Request->Ngaymua);  $Ngaymua->modify('+'.$Thoigianbdint.' month');

      // $Thoigianbdint = $Request->Thoigianbd;
      // $Thoigianbd = $Ngaymua;
      // }
      $Ngaykiemke = $Request->Ngaykiemke;
        $hinhanh=null;
         $hinhanh1=null;
          $hinhanh2=null;
           $hinhanh3=null;
        if($Request->has('edit')){
            $id = $Request->edit;
            if(($Request->Hinh)!=null){
            $hinhanh = $Request->Hinh->getClientOriginalName();
            $Request->Hinh->move('layouts/images/QLKho',$hinhanh);
            }
             if(($Request->Hinh1)!=null){
            $hinhanh1 = $Request->Hinh1->getClientOriginalName();
            $Request->Hinh1->move('layouts/images/QLKho',$hinhanh1);
            }
             if(($Request->Hinh2)!=null){
            $hinhanh2 = $Request->Hinh2->getClientOriginalName();
            $Request->Hinh2->move('layouts/images/QLKho',$hinhanh2);
            }
             if(($Request->Hinh3)!=null){
            $hinhanh3 = $Request->Hinh3->getClientOriginalName();
            $Request->Hinh3->move('layouts/images/QLKho',$hinhanh3);
            }
            $MVT = $Request->MVT;
            $MTB = $Request->MTB;
            $Ngaynhap = $Request->Ngaynhap;
            $Ten = $Request->Ten;
            $Thongso = $Request->Thongso;
            $Sl = $Request->Sl;
            $Congty = $Request->Congty;
            $dvt = $Request->dvt;
            // Thêm 
            $Sohopdong = $Request->Sohopdong;
            $Nguoimua = $Request->Nguoimua;
            $Ngaymua = $Request->Ngaymua;
            $Thoigianbh = $Request->Thoigianbh;
            $Thoigiankh = $Request->Thoigiankh;
            $Giatri = $Request->Giatri;
            $Ghichu = $Request->Ghichu;
            $Nhacungcap = $Request->Nhacungcap;
            $Luuy = $Request->Luuy;
              $Phieugiaonhan = $Request->Phieugiaonhan;
              
            $Nhap = QuanlykhoModel::find($id);
            $Nhap->Congty = $Congty;
            if($hinhanh!=null)
             $Nhap->Hinh = $hinhanh;
         if($hinhanh1!=null)
             $Nhap->Hinh1 = $hinhanh1;
         if($hinhanh2!=null)
             $Nhap->Hinh2 = $hinhanh2;
         if($hinhanh3!=null)
             $Nhap->Hinh3 = $hinhanh3;
            $Nhap ->MVT = $MVT;
           
            $Nhap->Ten = $Ten;
            $Nhap->Thongso = $Thongso;
            $Nhap->Sl = $Sl;
            $Nhap->dvt = $dvt;
            $Nhap->Nguoiphutrach = Auth::user()->name;
            $Nhap->Ngaynhap = $Ngaynhap;
            $Nhap->Trangthai = 0;
            //Thêm 
            $Nhap->Sohopdong = $Sohopdong;
            $Nhap->Nguoimua = $Nguoimua;
            $Nhap->Ngaymua = $Ngaymua;
            $Nhap->Thoigianbh = $Thoigianbh;
            $Nhap->Thoigiankh = $Thoigiankh;
            $Nhap->Thoigianbd = $Ngaymua;
            $Nhap->Ngaykiemke = $Ngaykiemke;
            $Nhap->Giatri = $Giatri;
            $Nhap->Nhacungcap = $Nhacungcap;
            $Nhap->Ghichu = $Ghichu;
             $Nhap->Luuy = $Luuy;
             $Nhap->Phieugiaonhan = $Phieugiaonhan;
            $Nhap->Bophan = "Kho";
            $Nhap->save();
            // chỉnh sửa đồng bộ
            if($hinhanh!=null){
            \DB::table('khotong')->where('MVT',$MVT)->update([
                'Thongso'=>$Thongso,'Ten'=>$Ten,'dvt'=>$dvt,
                'Hinh'=>$hinhanh,'Hinh1'=>$hinhanh1,'Hinh2'=>$hinhanh2,'Hinh3'=>$hinhanh3
            ]);
             \DB::table('tsphongban')->where('MVT',$MVT)->update([
                'Thongso'=>$Thongso,'Ten'=>$Ten,'dvt'=>$dvt,
                'Hinh'=>$hinhanh,'Hinh1'=>$hinhanh1,'Hinh2'=>$hinhanh2,'Hinh3'=>$hinhanh3
            ]);
         }
         else{
            \DB::table('khotong')->where('MVT',$MVT)->update([
                'Thongso'=>$Thongso,'Ten'=>$Ten,'dvt'=>$dvt,
                
            ]);
             \DB::table('tsphongban')->where('MVT',$MVT)->update([
                'Thongso'=>$Thongso,'Ten'=>$Ten,'dvt'=>$dvt,
               
            ]);
         }
            // History
             $Nhaphis = new HistoryNhapModel;
                    $Nhaphis->MVT = $MVT;
                    $Nhaphis->Ten = $Ten;
                    $Nhaphis->Thongso = $Thongso;
                    $Nhaphis->Sl = $Sl;
                    $Nhaphis->Nguoinhap = Auth::user()->name;
                    $Nhaphis->Ngaynhap= $Ngaynhap;
                    $Nhaphis->Hinh = $hinhanh;
                    $Nhaphis->Hinh1 = $hinhanh1;
                    $Nhaphis->Hinh2 = $hinhanh2;
                    $Nhaphis->Hinh3 = $hinhanh3;
                    $Nhaphis->Congty = $Congty;
                    $Nhaphis->Sohopdong = $Sohopdong;
                    $Nhaphis->Nguoimua = $Nguoimua;
                    $Nhaphis->Ngaymua = $Ngaymua;
                    $Nhaphis->Thoigianbh = $Thoigianbh;
                    $Nhaphis->Thoigiankh = $Thoigiankh;
                    $Nhaphis->Giatri = $Giatri;                    
                    $Nhaphis->Ghichu = 'Chỉnh sửa';
                    $Nhaphis->save();
            return back();}
            if($MVTtontai != null)
           {
            $bol=1;
            $hinhanh = $MVTtontai->Hinh;
             $hinhanh1 = $MVTtontai->Hinh1;
              $hinhanh2 = $MVTtontai->Hinh2;
               $hinhanh3 = $MVTtontai->Hinh3;
           } 
            if($Request->has('Hinh')){
        if(strtolower($Request->Hinh->getClientOriginalExtension()) == 'jpg' || strtolower($Request->Hinh->getClientOriginalExtension()) == 'png')
            $bol = 1;
              $hinhanh = $Request->Hinh->getClientOriginalName();
            $Request->Hinh->move('layouts/images/QLKho',$hinhanh);

                if($Request->has('Hinh1')){
            if(strtolower($Request->Hinh1->getClientOriginalExtension()) == 'jpg' || strtolower($Request->Hinh1->getClientOriginalExtension()) == 'png' || strtolower($Request->Hinh1->getClientOriginalExtension()) == 'jpeg'){
                     $hinhanh1 = $Request->Hinh1->getClientOriginalName();
            $Request->Hinh1->move('layouts/images/QLKho',$hinhanh1);
            }
                }
                
                    if($Request->has('Hinh2')){
            if(strtolower($Request->Hinh2->getClientOriginalExtension()) == 'jpg' || strtolower($Request->Hinh2->getClientOriginalExtension()) == 'png' || strtolower($Request->Hinh2->getClientOriginalExtension()) == 'jpeg' ){
                         $hinhanh2 = $Request->Hinh2->getClientOriginalName();
            $Request->Hinh2->move('layouts/images/QLKho',$hinhanh2);
            }
        }

            if($Request->has('Hinh3')){
            if(strtolower($Request->Hinh3->getClientOriginalExtension()) == 'jpg' || strtolower($Request->Hinh3->getClientOriginalExtension()) == 'png' || strtolower($Request->Hinh3->getClientOriginalExtension()) == 'jpeg'){
                         $hinhanh3 = $Request->Hinh3->getClientOriginalName();
            $Request->Hinh3->move('layouts/images/QLKho',$hinhanh3);
            }
        }
        }
        if($bol == 1)
    {       
            
            $MVT = $Request->MVT;
            $MTB = $Request->MTB;
            $Ngaynhap = $Request->Ngaynhap;
            $Ten = $Request->Ten;
            $Thongso = $Request->Thongso;
            $Sl = $Request->Sl;
            $Congty = $Request->Congty;
            $dvt = $Request->dvt;
            // Thêm 
            $Sohopdong = $Request->Sohopdong;
            $Nguoimua = $Request->Nguoimua;
            $Ngaymua = $Request->Ngaymua;
            $Thoigianbh = $Request->Thoigianbh;
            $Thoigiankh = $Request->Thoigiankh;
            $Giatri = $Request->Giatri;
            $Ghichu = $Request->Ghichu;
             $Luuy = $Request->Luuy;
             $Phieugiaonhan = $Request->Phieugiaonhan;
            if($Sl <= 0)
                return back();
            else{
                    $Nhap = new QuanlykhoModel;
                    $Nhap->Congty = $Congty;
                    $Nhap->Hinh = $hinhanh;
                    $Nhap->Hinh1 = $hinhanh1;
                    $Nhap->Hinh2 = $hinhanh2;
                    $Nhap->Hinh3 = $hinhanh3;
                    $Nhap ->MVT = $MVT;
                    $Nhap->MTB = $MTB;
                    $Nhap->Ten = $Ten;
                    $Nhap->Thongso = $Thongso;
                    $Nhap->Sl = $Sl;
                    $Nhap->dvt = $dvt;
                    $Nhap->Nguoiphutrach = Auth::user()->name;
                    $Nhap->Ngaynhap = $Ngaynhap;
                    $Nhap->Trangthai = 0;
                    //Thêm 
                     $Nhap->Nhacungcap = $Nhacungcap;
                    $Nhap->Sohopdong = $Sohopdong;
                    $Nhap->Nguoimua = $Nguoimua;
                    $Nhap->Ngaymua = $Ngaymua;
                    $Nhap->Thoigianbh = $Thoigianbh;
                    $Nhap->Thoigiankh = $Thoigiankh;
                    $Nhap->Thoigianbd = $Ngaymua;
                    $Nhap->Ngaykiemke = $Ngaykiemke;
                    $Nhap->Giatri = $Giatri;
                    $Nhap->Bophan = "Kho";
                    $Nhap->Ghichu = $Ghichu;
                    $Nhap->Luuy = $Luuy;
                    $Nhap->Phieugiaonhan = $Phieugiaonhan;
                    $Nhap->save();

                    $Nhaphis = new HistoryNhapModel;
                    $Nhaphis->MVT = $MVT;
                    $Nhaphis->Ten = $Ten;
                    $Nhaphis->Thongso = $Thongso;
                    $Nhaphis->Sl = $Sl;
                    $Nhaphis->Nguoinhap = Auth::user()->name;
                    $Nhaphis->Ngaynhap= $Ngaynhap;
                    $Nhaphis->Hinh = $hinhanh;
                    $Nhaphis->Congty = $Congty;
                    $Nhaphis->Sohopdong = $Sohopdong;
                    $Nhaphis->Nguoimua = $Nguoimua;
                    $Nhaphis->Ngaymua = $Ngaymua;
                    $Nhaphis->Thoigianbh = $Thoigianbh;
                    $Nhaphis->Thoigiankh = $Thoigiankh;
                    $Nhaphis->Giatri = $Giatri;
                    $Nhaphis->Ghichu = 'Nhập mới';
                    $Nhaphis->save();
                    return back();
            }
            
            }

        
        return 'Tài sản không tồn tại';
    }
    public function Xuatkho(Request $Request){
       
            $bol = 0;
            $MTB = $Request->MTBX;
            $MVT = $Request->MVT;
            $Ngaynhan = $Request->Ngaynhan;
            $Bophannhan = $Request->Bophannhan;
            $Nguoiphutrach = $Request->NguoiphutrachBP;
            $Sl = $Request->Slc;
            $locat =  $Request->location;
        $bangtong = \DB::table('khotong')->where('MVT',$MVT)->get()->first();
        
        if($bangtong->Sl < $Sl)
            for ($i = 0 ; $i < sizeof($MTB) ; $i++){
                $bangtong2 = \DB::table('khotong')->where('MVT',$MVT)->where('MTB',$MTB[$i])->get();

                if(!($bangtong2->isEmpty())){
                $check =    \DB::table('khotong')->where('MVT',$MVT)->where('MTB',$MTB[$i])->get()->first();
                if($check->Sl < $Sl){
                    return 'Số lượng trong kho không đủ';
                }
                else
                    $Nhap = new TaiSanPhongBanModel;
                    $Nhap->Sl = 1;
                    $Nhap->MVT = $MVT;
                    $Nhap->MTB = $MTB[$i];
                    $Nhap->Ngaynhan = $Ngaynhan;
                    $Nhap->Bophan = $Bophannhan;
                    $Nhap->Nguoiphutrach = $Nguoiphutrach;
                    $Nhap->Ten = $bangtong->Ten;
                    $Nhap->Thongso = $bangtong->Thongso;
                    $Nhap->Hinh = $bangtong->Hinh;
                    $Nhap->Hinh1 = $bangtong->Hinh1;
                    $Nhap->Hinh2 = $bangtong->Hinh2;
                    $Nhap->Hinh3 = $bangtong->Hinh3;
                    $Nhap->Congty = $bangtong->Congty;
                    $Nhap->dvt = $bangtong->dvt;
                    $Nhap->Luuy = $bangtong->Luuy;
                    //Thêm
                    $Nhap->Sohopdong = $bangtong->Sohopdong;
                    $Nhap->Nguoimua = $bangtong->Nguoimua;
                    $Nhap->Ngaymua = $bangtong->Ngaymua;
                    $Nhap->Thoigianbh = $bangtong->Thoigianbh;
                    $Nhap->Thoigiankh = $bangtong->Thoigiankh;
                    $Nhap->Thoigianbd = $bangtong->Thoigianbd;
                    $Nhap->Ngaykiemke = $bangtong->Ngaykiemke;
                    $Nhap->Giatri = $bangtong->Giatri;
                    $Nhap->Location = $Request->location;
                      $Nhap->Ghichu = $bangtong->Ghichu;
                        $Nhap->Nhacungcap = $bangtong->Nhacungcap;
                        $Nhap->Trangthai = 0;
                        $Nhap->Nguoithuchien = Auth::user()->name;

                    $Nhap->save();


                    //history 
                    $his = new HistoryDCModel;
                    $his->MVT = $MVT;
                    $his->MTB= $MTB[$i];
                    $his->History=$Bophannhan;
                    $his->Ngaychuyen = $Ngaynhan;
                    $his->Nguoiphutrach  = $Nguoiphutrach;
                    $his->Trangthai = 0;
                    $his->Location = $Request->location;
                    $his->save();
                    \DB::table('khotong')->where('MVT',$MVT)->where('MTB',$MTB[$i])->delete();
                     QuanlykhoController::phieuxuat($Request->PXK,$Nguoiphutrach,$Bophannhan,$Request->lydo,$MVT,$MTB[$i]);
                    return back();
                }
            }

        else{
            
            $condition2 = \DB::table('khotong')->where('MVT',$MVT)->get()->first();
            if ($condition2->Sl == 0)
                \DB::table('khotong')->where('MVT',$MVT)->delete();
            for ($i = 0 ; $i < sizeof($MTB) ; $i++){
                $condition = \DB::table('khotong')->where('MVT',$MVT)->where('MTB',$MTB[$i])->get();
                if($condition->isEmpty()){
                    \DB::table('khotong')->where('MVT',$MVT)->decrement('Sl',1);
                    $Nhap = new TaiSanPhongBanModel;
                    $Nhap->Sl = 1;
                    $Nhap->MVT = $MVT;
                    $Nhap->MTB = $MTB[$i];
                    $Nhap->Ngaynhan = $Ngaynhan;
                    $Nhap->Bophan = $Bophannhan;
                    $Nhap->Nguoiphutrach = $Nguoiphutrach;
                    $Nhap->Ten = $bangtong->Ten;
                    $Nhap->Thongso = $bangtong->Thongso;
                    $Nhap->Hinh = $bangtong->Hinh;
                    $Nhap->Hinh1 = $bangtong->Hinh1;
                    $Nhap->Hinh2 = $bangtong->Hinh2;
                    $Nhap->Hinh3 = $bangtong->Hinh3;
                    $Nhap->Congty = $bangtong->Congty;
                    $Nhap->dvt = $bangtong->dvt;
                    $Nhap->Luuy = $bangtong->Luuy;
                    //Thêm
                    $Nhap->Sohopdong = $bangtong->Sohopdong;
                    $Nhap->Nguoimua = $bangtong->Nguoimua;
                    $Nhap->Ngaymua = $bangtong->Ngaymua;
                    $Nhap->Thoigianbh = $bangtong->Thoigianbh;
                    $Nhap->Thoigiankh = $bangtong->Thoigiankh;
                     $Nhap->Thoigianbd = $bangtong->Thoigianbd;
                    $Nhap->Ngaykiemke = $bangtong->Ngaykiemke;
                    $Nhap->Giatri = $bangtong->Giatri;
                    $Nhap->Location = $Request->location;
                        $Nhap->Ghichu = $Request->Ghichu;
                        $Nhap->Nhacungcap = $Request->Nhacungcap;
                          $Nhap->Trangthai = 0;
                        $Nhap->Nguoithuchien = Auth::user()->name;
                    $Nhap->save();

                    $Nhaphis = new HistoryDCModel;
                    $Nhaphis->MVT = $MVT;
                    $Nhaphis->MTB = $MTB[$i];
                    $Nhaphis->Ngaychuyen = $Ngaynhan;
                    $Nhaphis->Nguoiphutrach = $Nguoiphutrach;
                    $Nhaphis->Trangthai=0;
                    $Nhaphis->History = $Bophannhan;
                    $Nhaphis->Location = $Request->location;
                       $Nhaphis->Nguoithuchien = Auth::user()->name;
                    $Nhaphis->save();
                      QuanlykhoController::phieuxuat($Request->PXK,$Nguoiphutrach,$Bophannhan,$Request->lydo,$MVT,$MTB[$i]);
                    return back();
                    }
                    else{
                    $Nhap = new TaiSanPhongBanModel;
                    $Nhap->Sl = 1;
                    $Nhap->MVT = $MVT;
                    $Nhap->MTB = $MTB[$i];
                    $Nhap->Ngaynhan = $Ngaynhan;
                    $Nhap->Bophan = $Bophannhan;
                    $Nhap->Nguoiphutrach = $Nguoiphutrach;
                    $Nhap->Ten = $bangtong->Ten;
                    $Nhap->Thongso = $bangtong->Thongso;
                    $Nhap->Hinh = $bangtong->Hinh;
                    $Nhap->Hinh1 = $bangtong->Hinh1;
                    $Nhap->Hinh2 = $bangtong->Hinh2;
                    $Nhap->Hinh3 = $bangtong->Hinh3;
                    $Nhap->Congty = $bangtong->Congty;
                    $Nhap->dvt = $bangtong->dvt;
                    $Nhap->Luuy = $bangtong->Luuy;
                    //Thêm
                    $Nhap->Sohopdong = $bangtong->Sohopdong;
                    $Nhap->Nguoimua = $bangtong->Nguoimua;
                    $Nhap->Ngaymua = $bangtong->Ngaymua;
                    $Nhap->Thoigianbh = $bangtong->Thoigianbh;
                    $Nhap->Thoigiankh = $bangtong->Thoigiankh;
                     $Nhap->Thoigianbd = $bangtong->Thoigianbd;
                    $Nhap->Ngaykiemke = $bangtong->Ngaykiemke;
                    $Nhap->Giatri = $bangtong->Giatri;
                    $Nhap->Location =  $Request->location;
                        $Nhap->Ghichu = $bangtong->Ghichu;
                        $Nhap->Nhacungcap = $bangtong->Nhacungcap;
                          $Nhap->Trangthai = 0;
                        $Nhap->Nguoithuchien = Auth::user()->name;
                    $Nhap->save();
                     QuanlykhoController::phieuxuat($Request->PXK,$Nguoiphutrach,$Bophannhan,$Request->lydo,$MVT,$MTB[$i]);
                    \DB::table('khotong')->where('MVT',$MVT)->where('MTB',$MTB[$i])->delete();
                   $Nhaphis = new HistoryDCModel;
                    $Nhaphis->MVT = $MVT;
                    $Nhaphis->MTB = $MTB[$i];
                    $Nhaphis->Ngaychuyen = $Ngaynhan;
                    $Nhaphis->Nguoiphutrach = $Nguoiphutrach;
                    $Nhaphis->Trangthai=0;
                    $Nhaphis->History = $Bophannhan;
                    $Nhaphis->Location =  $Request->location;
                    $Nhaphis->Nguoithuchien = Auth::user()->name;
                    $Nhaphis->save();

                    }
            }
            return back();
            }
    }
    public function XuatkhoV2(Request $Request){
        $id = $Request->id;
        $data = \DB::table('khotong')->where('id',$id)->get()->first();
        if($data->MTB != null)
          return    array('MTB'=>$data->MTB,'MVT'=>$data->MVT,'Sl'=>$data->Sl);
        else
            return array("MVT"=>$data->MVT);
    }
    public function postXuatkhoV2(Request $Request){
        $id = $Request->id;
            $MTB = $Request->MTBX;
            $MVT = $Request->MVT;
            $Ngaynhan = $Request->Ngaynhan;
            $Bophannhan = $Request->Bophannhan;
            $Nguoiphutrach = $Request->NguoiphutrachBP;
            $Sl = $Request->Slc;
            $locat =  $Request->location;
            $bangtong = \DB::table('khotong')->where('id',$id)->get()->first();
        if($bangtong->Sl < $Sl)
            return 'Số lượng ko phù hợp';
        else{
            for ($i = 0 ; $i < sizeof($MTB) ; $i++){
                \DB::table('khotong')->where('id',$id)->decrement('Sl',1);
                    $Nhap = new TaiSanPhongBanModel;
                    $Nhap->Sl = 1;
                    $Nhap->MVT = $MVT;
                    $Nhap->MTB = $MTB[$i];
                    $Nhap->Ngaynhan = $Ngaynhan;
                    $Nhap->Bophan = $Bophannhan;
                    $Nhap->Nguoiphutrach = $Nguoiphutrach;
                    $Nhap->Ten = $bangtong->Ten;
                    $Nhap->Thongso = $bangtong->Thongso;
                    $Nhap->Hinh = $bangtong->Hinh;
                    $Nhap->Hinh1 = $bangtong->Hinh1;
                    $Nhap->Hinh2 = $bangtong->Hinh2;
                    $Nhap->Hinh3 = $bangtong->Hinh3;
                    $Nhap->Congty = $bangtong->Congty;
                    $Nhap->dvt = $bangtong->dvt;
                     $Nhap->Luuy = $bangtong->Luuy;
                    //Thêm
                    $Nhap->Sohopdong = $bangtong->Sohopdong;
                    $Nhap->Nguoimua = $bangtong->Nguoimua;
                    $Nhap->Ngaymua = $bangtong->Ngaymua;
                    $Nhap->Thoigianbh = $bangtong->Thoigianbh;
                    $Nhap->Thoigiankh = $bangtong->Thoigiankh;
                    $Nhap->Thoigianbd = $bangtong->Thoigianbd;
                    $Nhap->Ngaykiemke = $bangtong->Ngaykiemke;
                    $Nhap->Giatri = $bangtong->Giatri;
                    $Nhap->Location = $Request->location;
                    $Nhap->Ghichu = $bangtong->Ghichu;
                        $Nhap->Nhacungcap = $bangtong->Nhacungcap;
                          $Nhap->Trangthai = 0;
                        $Nhap->Nguoithuchien = Auth::user()->name;
                    $Nhap->save();

                    $Nhaphis = new HistoryDCModel;
                    $Nhaphis->MVT = $MVT;
                    $Nhaphis->MTB = $MTB[$i];
                    $Nhaphis->Ngaychuyen = $Ngaynhan;
                    $Nhaphis->Nguoiphutrach = $Nguoiphutrach;
                    $Nhaphis->Trangthai=0;
                    $Nhaphis->History = $Bophannhan;
                    $Nhaphis->Location = $Request->location;
                       $Nhaphis->Nguoithuchien = Auth::user()->name;
                    $Nhaphis->save();
                     QuanlykhoController::phieuxuat($Request->PXK,$Nguoiphutrach,$Bophannhan,$Request->lydo,$MVT,$MTB[$i]);
            }
            return back();
        }
    }

    public function GetInformartionNV(Request $Request){
            $Manv = \DB::table('dsnv')->where([
                'Phongban'=> $Request->phongban,
            ])->select('Hoten')->get();
            return $Manv;
    }
    public function MTB(Request $Request){
        $MTB = \DB::table('tsphongban')->where(['MVT'=>$Request->MVT,'MTB'=>$Request->MTB])->get();
        return $MTB;

    } 
     public function MTB2(Request $Request){
        $ss1 =\DB::table('khotong')->select('MTB')->orderBy('MTB','DESC')->get();
        $ss2 = \DB::table('tsphongban')->select('MTB')->orderBy('MTB','DESC')->get();
        if($ss1 > $ss2)
        return $ss1;
        else
        return $ss2;
        

    } 

    //bảng điều chuyển
    public function TableControl(Request $Request){
        $data = \DB::table('khotong')->where('MVT',$Request->MVT)->get();
        return $data;
    }
    public function ShowImage(Request $Request){
        $data = \DB::table('khotong')->where('MVT',$Request->id)->get()->first();
        return view('Admin.ShowImage')->with('key',$data);
    }
    public function ShowImageTSPB(Request $Request){
        $data = \DB::table('tsphongban')->where('MVT',$Request->id)->get()->first();
        return view('Admin.ShowImageTSPB')->with('key',$data);
    }
    public function getMVT(Request $Request){
        $data = \DB::table('khotong')->select('MVT')->where('MVT',$Request->MVT)->get();
        return $data;
    }
    public function editKho(Request $Request){
        $data = \DB::table('khotong')->where('id',$Request->id)->get();
        return $data;
    }
    function history(Request $Request){
        $getId = \DB::table('khotong')->where('MVT',$Request->id)->get()->first();
        $detail = \DB::table('khotong')->where('MVT',$Request->id)->where('Sl','>=',1)->get();
      
           $his = \DB::table('historydc')->where('MVT',$getId->MVT)->where('Trangthai',0)->get();

        return view('Admin.lichsukho')->with('his',$his)->with('ten',$getId)->with('detail',$detail);
    }
    function historyTSPB(Request $Request){
        $getId = \DB::table('tsphongban')->where('MVT',$Request->id)
        ->where(['MVT'=>$Request->id,'Bophan'=>$Request->His,'Location'=>$Request->Loc])
        ->get()->first();
       
            $his =  \DB::table('tsphongban')->where(['MVT'=>$Request->id,'Bophan'=>$Request->His,'Location'=>$Request->Loc])->get();

        $detail = \DB::table('tsphongban')->where(['MVT'=>$Request->id])->get();
         
        return view('Admin.DetailTSPB')->with('his',$his)->with('ten',$getId)->with('detail',$detail);
    }
    function historyTSPB2(Request $Request){
            $his= \DB::table('historydc')->where('MTB',$Request->MTB)->get();
        return view('Admin.lichsu')->with('his',$his);
    }

    public function getTen(Request $Request){
        $Ten = $Request->Ten;
        $data2 = \DB::table('tsphongban')->SELECT('Ten')->where('Ten','like','%'.$Ten.'%');
        $data = \DB::table('khotong')->SELECT('Ten')->where('Ten','like','%'.$Ten.'%')->union($data2)->get();
         
       
        return $data;
    }
    public function getMVT_Ten(Request $Request){
        $data1 = \DB::table('tsphongban')->where('Ten',$Request->Ten)->select('MVT','Hinh','Congty','Thongso','dvt','Giatri');
        $data = \DB::table('khotong')->select('MVT','Hinh','Congty','Thongso','dvt','Giatri')->where('Ten',$Request->Ten)->union($data1)->get()->first();
        return array('MVT'=>$data->MVT,'Hinh'=>$data->Hinh,'Congty'=>$data->Congty,'Thongso'=>$data->Thongso,'dvt'=>$data->dvt,'Giatri'=>$data->Giatri);
    }
    public function ChinhsuaTSPB(Request $Request){
        $Ngaynhan = $Request->Ngaynhan;
        $Bophan = $Request->Bophan;
        $Nguoiphutrach = $Request->Nguoiphutrach;
        $Vitri = $Request->Vitri;
        $id = $Request->id;


        // Điều chỉnh lịch sử
        $dataquery = \DB::table('tsphongban')->where('id',$id)->get()->first();
     $his  =\DB::table('historydc')->where(['MVT'=>$dataquery->MVT,'MTB'=>$dataquery->MTB])->orderBy('created_at','DESC')->get()->first();
        \DB::table('historydc')->where('id',$his->id)->update(['History'=>$Bophan,'Ngaychuyen'=>$Ngaynhan,'Nguoiphutrach'=>$Nguoiphutrach,'Location'=>$Vitri]);
        \DB::table('tsphongban')->where('id',$id)->update(['Nguoiphutrach'=>$Nguoiphutrach,'Ngaynhan'=>$Ngaynhan,'Bophan'=>$Bophan,'Location'=>$Vitri]);
        return "Success";
    }

    public function MVTtt(){
        $MVT1 = \DB::table('khotong')->select('MVT')->orderBy('MVT','DESC')->get()->first();
         $MVT2 = \DB::table('tsphongban')->select('MVT')->orderBy('MVT','DESC')->get()->first(); 
         if($MVT1->MVT >$MVT2->MVT)
            $MVTtt = ++$MVT1->MVT;
        else
            $MVTtt = ++$MVT2->MVT;
        
        return $MVTtt;
    }

    public function ExportKho(){



        $data =  \DB::select(\DB::raw('SELECT MVT,Thongso,Ten,Ghichu,Hinh, SUM(Sl) as Sl FROM khotong WHERE Sl>=1 GROUP BY MVT,Ten,Ghichu,Thongso,Hinh'));
           Excel::create('Danh sách tài sản kho',function($excel) use($data){
            $excel->sheet('Sheet1',function($sheet) use($data){
                  
                $i =1;
                      
                        $sheet->row(1,array('Mã vật tư','Tên', 'Thông số','Số lượng',"Hình"));
                        $sheet->row(1,function($row){
                            $row->setBackground('#CC0000');

                        });
                        foreach ($data as $key) {
                               $objDrawing = new PHPExcel_Worksheet_Drawing;
                             $hinh =  $objDrawing->setPath(public_path('layouts\\images\\QLKho\\'.$key->Hinh)); //your image path
                            
                           
                            $sheet->row(++$i,array($key->MVT,$key->Ten,$key->Thongso,$key->Sl));
                            $objDrawing->setCoordinates('E'.$i);
                              $objDrawing->setHeight(100);
                             $objDrawing->setWorksheet($sheet);

                              $sheet->setHeight(array(
                            $i     =>  100,
                            
                        ));
                                $sheet->getStyle('A1:E'.$i)->getAlignment()->setWrapText(true)->applyFromArray(array(
                                    'horizontal' => 'center',
                                    'vertical' =>'center'
                                ));
                        }
                        $sheet->setAutoSize(true);
                        $sheet->setWidth(array(
                                'E'     =>  10,
                                'B'     =>  45,
                                'C'     => 50,
                        ));
                      $sheet->setStyle(array(
                                'font' => array(
                                    'name'      =>  'Arial',
                                    'size'      =>  15,
                                    'valignment' => 'center',
                                )
                            ));
                     

            });
           })->export('xlsx');
           return back();
    }

    public function postExportPB(Request $Request){
        ini_set('max_execution_time', 600);
        $query = \DB::table('tsphongban');
        $Phongban = $Request->Bophan;
        $MVT = $Request->MVT;
        $Ngay = $Request->Ngay;
        $Vitri = $Request->Vitri;
        if($Phongban!=null)
            $query = $query->where('Bophan',$Phongban);
         if($MVT!=null)
            $query = $query->where('MVT',$MVT);
         if($Ngay!=null)
            $query = $query->where('Ngaynhan',$Ngay);
         if($Vitri!=null)
            $query = $query->where('Location',$Vitri);

       $data = $query->select(\DB::raw("MVT,Ten,Bophan,Nguoiphutrach,Hinh,Location,SUM(Sl) as Sl"))->groupBy('MVT','Location','Ten','Hinh','Bophan','Nguoiphutrach')->get();
       
        Excel::create('Danh sách tài sản phòng ban',function($excel) use($data){
            $excel->sheet('Sheet1',function($sheet) use($data){
                  
                $i =1;
                     
                        $sheet->row(1,array('Mã vật tư','Tên', 'Bộ phận','Người phụ trách','Số lượng','Vị trí'));
                        $sheet->row(1,function($row){
                            $row->setBackground('#CC0000');

                        });
                        foreach ($data as $key) {
                               $objDrawing = new PHPExcel_Worksheet_Drawing;
                             $hinh =  $objDrawing->setPath(public_path('layouts\\images\\QLKho\\'.$key->Hinh));
                              //your image path
                            
                           
                            $sheet->row(++$i,array($key->MVT,$key->Ten,$key->Bophan,$key->Nguoiphutrach,$key->Sl,$key->Location));
                            $objDrawing->setCoordinates('G'.$i);
                              $objDrawing->setHeight(100);
                             $objDrawing->setWorksheet($sheet);

                              $sheet->setHeight(array(
                            $i     =>  100,
                            
                        ));
                                $sheet->getStyle('A1:G'.$i)->getAlignment()->setWrapText(true)->applyFromArray(array(
                                    'horizontal' => 'center',
                                    'vertical' =>'center'
                                ));
                        }
                        $sheet->setAutoSize(true);

                        $sheet->setWidth(array(
                                'G'     =>  10,
                                'B'     =>  23,
                             
                        ));

                      $sheet->setStyle(array(
                                'font' => array(
                                    'name'      =>  'Arial',
                                    'size'      =>  15,
                                    'valignment' => 'center',
                                )
                            ));
                        

            });
           })->export('xlsx');
           return back();
    }
    public function getLocation(Request $Request){
        $vitri = $Request->Location.'%';
        $location = \DB::table('historydc')->select('Location')->where('Location','like',$vitri)->groupBy('Location')->get();
        return $location;
    }
    public function ExportPhieuXuat(Request $Request){
         date_default_timezone_set("Asia/Ho_Chi_Minh");
         header('Content-Type: text/html; charset=utf-8');
         $date = getdate();
        $Sophieu = $Request->Sophieu;

        // $data = \DB::table('luutruphieuxn')
        // ->where("luutruphieuxn.Sophieu",$Sophieu)
        // ->join('tsphongban','luutruphieuxn.MTB','=','tsphongban.MTB')
        // ->select('luutruphieuxn.Sophieu','luutruphieuxn.Nguoinhan','luutruphieuxn.Lydoxuat','luutruphieuxn.Bophan','tsphongban.MVT','tsphongban.Ten','tsphongban.dvt','tsphongban.Sl','tsphongban.Location')
        // ->groupBy('luutruphieuxn.Sophieu','luutruphieuxn.Nguoinhan','luutruphieuxn.Lydoxuat','luutruphieuxn.Bophan','tsphongban.MVT','tsphongban.Ten','tsphongban.dvt','tsphongban.Location')
        // ->SUM('tsphongban.Sl');
        // dd($data);
        // xuât file 
        $data = \DB::select(\DB::raw("SELECT luutruphieuxn.Sophieu,luutruphieuxn.Nguoinhan,luutruphieuxn.Lydoxuat,luutruphieuxn.Bophan,tsphongban.MVT,tsphongban.Ten,tsphongban.dvt,SUM(tsphongban.Sl) as Sl,tsphongban.Location FROM luutruphieuxn,tsphongban where luutruphieuxn.MTB=tsphongban.MTB and luutruphieuxn.Sophieu = N'$Sophieu' group by luutruphieuxn.Sophieu,luutruphieuxn.Nguoinhan,luutruphieuxn.Lydoxuat,luutruphieuxn.Bophan,tsphongban.MVT,tsphongban.Ten,tsphongban.dvt,tsphongban.Location"));
       
        $nguoinhan = $data[0]->Nguoinhan;
         $filename = 'PTNso_'.$Sophieu.'.docx';


         $phpWord = new \PhpOffice\PhpWord\PhpWord();
      
         $process  = new TemplateProcessor('Form\\phieuxk.docx');

         // $section = $phpWord->createSection();
         //    $table = $section->addTable();
         //    $table->addRow(900);
         //    // Add cells
         //    $table->addCell(2000)->addText('Col 1');
         //    $table->addCell(2000)->addText('Col 2');
         //    $table->addCell(2000)->addText('Col 3');
         //    $objWriter =  \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $process->setValue('PXK', $data[0]->Sophieu);    
        $process->setValue('Nguoinhan', $data[0]->Nguoinhan);
        $process->setValue('Lydo',$data[0]->Lydoxuat);
        $process->setValue('Phongban',$data[0]->Bophan);
        $process->setValue('Ngay',$date['mday']);
        $process->setValue('Thang',$date['mon']);
        $process->setValue('Nam',$date['year']);
   

             $process->cloneRow('i',sizeof($data));
              // $process->setValue('MVT#1',$data[0]->MVT);
              //  $process->setValue('MVT#2',$data[1]->MVT);
              //   $process->setValue('MVT#3',$data[2]->MVT);
             
            
                    $i = 1;
                   
                    for($i;$i <= sizeof($data);$i++){
                     $process->setValue('i#'.$i,$i);
                     $process->setValue('MVT#'.$i,$data[$i-1]->MVT);
                      // $process->setValue('MTB#'.$i,$data[$i-1]->MTB);
                       $process->setValue('Ten#'.$i,$data[$i-1]->Ten);
                        $process->setValue('dvt#'.$i,$data[$i-1]->dvt);
                         $process->setValue('Sl#'.$i,$data[$i-1]->Sl);
                          $process->setValue('Location#'.$i,htmlspecialchars($data[$i-1]->Location));

            }



                   
             

        
      

        // $objWriter->save(storage_path('app\\public\\result.docx'));
        $process->saveAs(storage_path('app\\public\\'.$Sophieu.'.docx'));
        return response()->download(storage_path('app\\public\\'.$Sophieu.'.docx'));
    }
    public function EditTSPB(Request $Request){
            $Sua = TaiSanPhongBanModel::find($Request->id);
             \DB::table('tsphongban')->where('MVT',$Sua->MVT)->update(['Sohopdong'=>$Request->Sohopdong,'Ngaymua'=>$Request->Ngaymua,'Nhacungcap'=>$Request->Nhacungcap,'Ghichu'=>$Request->Ghichu]);
        

        return back();
    }
    public function ChinhsuaHis(Request $Request){

            $Sua = HistoryDCModel::find($Request->id);

            $Sua->History = $Request->History;
            $Sua->Ngaychuyen = $Request->Ngaynhan;
            $Sua->Nguoiphutrach = $Request->Nguoiphutrach;
            $Sua->Location = $Request->Location;
            $Sua->save();
        return back();
    }

    public function DieuchuyenDetail(Request $Request){
 
             $Bophandieuchuyen = $Request->Bophannhan;
        $Ngaynhan = $Request->Ngaydieuchuyen;
        $NguoiphutrachBP = $Request->NguoiphutrachBP2;
   
        $locat = $Request->location2;
       
          $MTB = $Request->MTB;
                    if($Request->has('Thuhoi')){
               foreach($MTB as $key){
                $dataquery = \DB::table('tsphongban')->select('MVT','MTB','Ten','Thongso','Hinh','Hinh1','Hinh2','Hinh3','Congty','dvt','Ngaymua','Sohopdong','Nguoimua','Thoigianbh','Thoigiankh','Giatri','Ghichu','Nhacungcap','Luuy','Thoigianbd','Ngaykiemke','Sl')->where('MTB',$key)->get(); 

            $Kho = new QuanlykhoModel;
            $Kho->MVT = $dataquery[0]->MVT;
            $Kho->MTB = $dataquery[0]->MTB;
            $Kho->Ten = $dataquery[0]->Ten;
            $Kho->Thongso = $dataquery[0]->Thongso;
            $Kho->Hinh = $dataquery[0]->Hinh;
            $Kho->Hinh1 = $dataquery[0]->Hinh1;
            $Kho->Hinh2 = $dataquery[0]->Hinh2;
            $Kho->Hinh3 = $dataquery[0]->Hinh3;
            $Kho->Ngaynhap = now();
            $Kho->Nguoiphutrach =  Auth::user()->name;
            $Kho->Congty = $dataquery[0]->Congty;
            $Kho->Sl = $dataquery[0]->Sl;
            $Kho->dvt = $dataquery[0]->dvt;
            $Kho->Ngaymua = $dataquery[0]->Ngaymua;
            $Kho->Sohopdong = $dataquery[0]->Sohopdong;
            $Kho->Nguoimua = $dataquery[0]->Nguoimua;
            $Kho->Thoigianbh = $dataquery[0]->Thoigianbh;
            $Kho->Thoigiankh = $dataquery[0]->Thoigiankh;
            $Kho->Thoigianbd = $dataquery[0]->Thoigianbd;
             $Kho->Ngaykiemke = $dataquery[0]->Ngaykiemke;
              $Kho->Giatri = $dataquery[0]->Giatri;
                $Kho->Ghichu = $dataquery[0]->Ghichu;
                  $Kho->Nhacungcap = $dataquery[0]->Nhacungcap;
                  $Kho->Luuy = $dataquery[0]->Luuy;
    
            $Kho->Trangthai =3;
            $Kho->save();
        \DB::table('tsphongban')->where(["MVT"=>$dataquery[0]->MVT,
            'MTB'=>$dataquery[0]->MTB,
    ])->delete();
            $historydc = new HistoryDCModel;
            $historydc->MVT = $dataquery[0]->MVT;
            $historydc->MTB =$dataquery[0]->MTB;
            $historydc->History = "Kho";
            $historydc->Nguoiphutrach = Auth::user()->name;
            $historydc->Ngaychuyen = now();
            $historydc->Location = "Kho";
            $historydc->Trangthai = 1;
            $historydc->Nguoithuchien = Auth::user()->name;
            $historydc->save();
               }
          }
          else{
          foreach($MTB as $key){
            $data = \DB::table('tsphongban')->where('MTB',$key)->get()->first(); 

           $historydc = new HistoryDCModel;
           $historydc->MVT = $data->MVT;
           $historydc->MTB = $data->MTB;
           $historydc->History = $Bophandieuchuyen;
           $historydc->Ngaychuyen = $Ngaynhan;
           $historydc->Nguoiphutrach = $NguoiphutrachBP;
           $historydc->Location = $locat;
           $historydc->Trangthai = 1;
           $historydc->Nguoithuchien = Auth::user()->name;
           $historydc->save();

   \DB::table('tsphongban')->where('MTB',$key)->update(['Nguoiphutrach'=>$NguoiphutrachBP,
            'Ngaynhan'=>$Ngaynhan,'Bophan'=>$Bophandieuchuyen,'Nguoiphutrach'=>$NguoiphutrachBP,'Location'=>$locat,'Trangthai'=>1,'Nguoithuchien'=>Auth::user()->name]);
          }
          }
        return 'Đã chuyển';
    }
    public function getPX(){
        $data = \DB::table('luutruphieuxn')->orderBy('Sophieu','DESC')->get()->first();
        return ++$data->Sophieu;
    }
    public function formXuatKhoV2(Request $Request){
        $PXK = $Request->PXK;
        $Ngaynhap = $Request->Ngaynhap;
        $lydo = $Request->lydo;
        $Location = $Request->location;
        $Ngaynhan = $Request->Ngaynhan;
        $Bophannhan = $Request->Bophannhan;
        $NguoiphutrachBP = $Request->NguoiphutrachBP;
        $MVTX = $Request->MVTX;
        $SLX = $Request->SLX;
        $i = -1 ;
        $MTBtt  = \DB::select(\DB::raw('SELECT TOP 1 * FROM (select  MTB from khotong
            union ALL select MTB from tsphongban) as TableMTB order by MTB DESC'));

              foreach($MVTX as $key){
            $i++;
            $check = \DB::table('khotong')->where('MVT',$key)->select('dvt')->get()->first();
            if($check->dvt =="M"){
                ++$MTBtt[0]->MTB;
                     QuanlykhoController::phieuxuat($PXK,$NguoiphutrachBP,$Bophannhan,$lydo,$key,$MTBtt[0]->MTB);
                     QuanlykhoController::FormXuatKho($Ngaynhap,$key,$MTBtt[0]->MTB,$Bophannhan,$NguoiphutrachBP,$SLX[$i],$Ngaynhan,$Location);
                     QuanlykhoController::Nhaplichsu($key,$MTBtt[0]->MTB,$Bophannhan,$Ngaynhan,$NguoiphutrachBP,$Location,0);
            }
            else{
               
                 for($Slx = 1; $Slx <= $SLX[$i] ; $Slx++){
                     ++$MTBtt[0]->MTB;
                  QuanlykhoController::phieuxuat($PXK,$NguoiphutrachBP,$Bophannhan,$lydo,$key,$MTBtt[0]->MTB);

                     QuanlykhoController::FormXuatKho($Ngaynhap,$key,$MTBtt[0]->MTB,$Bophannhan,$NguoiphutrachBP,1,$Ngaynhan,$Location);
                     QuanlykhoController::Nhaplichsu($key,$MTBtt[0]->MTB,$Bophannhan,$Ngaynhan,$NguoiphutrachBP,$Location,0);
                }
            }

        }
        return back();
    }
    public function FormXuatKho($Ngaynhap=null,$MVT,$MTB,$Bophannhan,$Nguoiphutrach,$Sl,$Ngaynhan,$Location){
        
        if($Ngaynhap[0]==null){
        $bangtong = \DB::table('khotong')->where('MVT',$MVT)
        ->whereNull('MTB')
        ->where('Sl','>=',1)
        ->get()->first();
        
        }
        else{
         $bangtong = \DB::table('khotong')->where(['MVT'=>$MVT,'Ngaynhap'=>$Ngaynhap])->get()->first();
        }

       
        if($bangtong->Sl < $Sl){
                return "SỐ LƯỢNG KHÔNG ĐỦ";
        }
        else{
        $Nhap = new TaiSanPhongBanModel;
        $Nhap->MVT = $MVT;
        $Nhap->MTB = $MTB;
        $Nhap->Ngaynhan = $Ngaynhan;
        $Nhap->Bophan = $Bophannhan;           
        $Nhap->Nguoiphutrach = $Nguoiphutrach;
        $Nhap->Sl = $Sl;

        $Nhap->Ten = $bangtong->Ten;
        $Nhap->Thongso = $bangtong->Thongso;
        $Nhap->Hinh = $bangtong->Hinh;
        $Nhap->Hinh1 = $bangtong->Hinh1;
        $Nhap->Hinh2 = $bangtong->Hinh2;
        $Nhap->Hinh3 = $bangtong->Hinh3;
        $Nhap->Congty = $bangtong->Congty;
        $Nhap->dvt = $bangtong->dvt;
        $Nhap->Luuy = $bangtong->Luuy;
        $Nhap->Sohopdong = $bangtong->Sohopdong;
        $Nhap->Nguoimua = $bangtong->Nguoimua;
        $Nhap->Ngaymua = $bangtong->Ngaymua;
        $Nhap->Thoigianbh = $bangtong->Thoigianbh;
        $Nhap->Thoigiankh = $bangtong->Thoigiankh;
        $Nhap->Thoigianbd = $bangtong->Thoigianbd;
        $Nhap->Ngaykiemke = $bangtong->Ngaykiemke;
        $Nhap->Giatri = $bangtong->Giatri;
        $Nhap->Location = $Location;
        $Nhap->Ghichu = $bangtong->Ghichu;
        $Nhap->Nhacungcap = $bangtong->Nhacungcap;
        $Nhap->Trangthai = 0;
        $Nhap->Nguoithuchien = Auth::user()->name;
                    $Nhap->save();

            \DB::table('khotong')->where('id',$bangtong->id)->decrement('Sl',$Sl);
        }

    }
    public function Nhaplichsu($MVT , $MTB , $Bophannhan , $Ngaynhan , $Nguoiphutrach , $Location,$Trangthai){
         $his = new HistoryDCModel;
                    $his->MVT = $MVT;
                    $his->MTB= $MTB;
                    $his->History=$Bophannhan;
                    $his->Ngaychuyen = $Ngaynhan;
                    $his->Nguoiphutrach  = $Nguoiphutrach;
                    $his->Trangthai = $Trangthai;
                    $his->Location = $Location;
                    $his->Nguoithuchien = Auth::user()->name;
                    $his->save();
    }
    public function ViewFormXuat(Request $Request){
        $Sophieu = $Request->Sophieu;
      $data = \DB::select(\DB::raw("SELECT luutruphieuxn.Sophieu,luutruphieuxn.Nguoinhan,luutruphieuxn.Lydoxuat,luutruphieuxn.Bophan,tsphongban.MVT,tsphongban.Ten,tsphongban.dvt,SUM(tsphongban.Sl) as Sl,tsphongban.Location,tsphongban.Thongso FROM luutruphieuxn,tsphongban where luutruphieuxn.MTB=tsphongban.MTB and luutruphieuxn.Sophieu = N'$Sophieu' group by luutruphieuxn.Sophieu,luutruphieuxn.Nguoinhan,luutruphieuxn.Lydoxuat,luutruphieuxn.Bophan,tsphongban.MVT,tsphongban.Ten,tsphongban.dvt,tsphongban.Location,tsphongban.Thongso ORDER BY tsphongban.MVT ASC"));
        return view('Admin.ShowFormXuat')->with(['data'=>$data]);
    }
}

// class KhoVersion2{
//     private static function NhapKhoExcel(Request $Request){
//         $file = $Request->file;

//     } 
// }
