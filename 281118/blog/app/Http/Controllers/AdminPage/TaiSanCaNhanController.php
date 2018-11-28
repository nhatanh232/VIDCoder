<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomerProvider\TaiSanCaNhanModel;
use App\CustomerProvider\TaiSanPhongBanModel;

use App\CustomerProvider\QuanlykhoModel;
use \PhpOffice\PhpWord;

use Auth;
class TaiSanCaNhanController extends Controller
{
    public function ShowLuuTru(){
    	$data = \DB::table('tscanhan')->Where('Trangthai',1)->get();
    	return view('Admin.Taisancanhan.banglutru')->with('data',$data);
    }
    public function getImage(Request $Request){
    	$data = \DB::table('tscanhan')->where('id',$Request->id)->get()->first();
    	return view('Admin.Taisancanhan.ShowImageTSCN')->with('data',$data);
    }
    public function getDangkycn(){
    	return view('Admin.Taisancanhan.formdangky');
    }
    public function postDangkycn(Request $Request){
    			$Ten = $Request->Ten;
    			$Mota = $Request->Mota;
    			$Ngaydangky = $Request->Ngaydangky;
    			$Hinhanh = null;
    			$Maseri = $Request->Maseri;
    			if($Request->hasFile('Hinh')){
    				$Hinhanh = $Request->Hinh->getClientOriginalName();
    			if(strtolower($Request->Hinh->getClientOriginalExtension()) == 'jpg' || strtolower($Request->Hinh->getClientOriginalExtension()) == 'png')
    			$Request->Hinh->move('layouts/images/QLTSCN',$Hinhanh);;
    	}		
    			$dvt = $Request->dvt;
    			$Congty = $Request->Congty;
    			$Bophan = $Request->Bophan;
    			$Chutaisan = $Request->Chutaisan;

    		// $Nhap = new TaiSanCaNhanModel;
    		// $Nhap->Ten = $Ten;
    		// $Nhap->Mota = $Mota;
    		// $Nhap->Ngaydangky = $Ngaydangky;
    		// $Nhap->Hinh = $Hinhanh;
    		// $Nhap->Chutaisan = $Chutaisan;
    		// $Nhap->Bophan = $Bophan;
    		// $Nhap->Congty = $Congty;
    		// $Nhap->Nguoinhap = Auth::user()->name;
    		// $Nhap->dvt = $dvt;
    		// $Nhap->Maseri = $Maseri;
    		// $Nhap->Trangthai = 1;
    		// $Nhap->save();


//        $phpWord = new \PhpOffice\PhpWord\PhpWord();

// $section = $phpWord->addSection();

// $section->addText('Hello World!What the fuck say');
// $section->addText('Hello World!What the fuck say');
// $section->addText('Hello World!What the fuck say');
// $section->addText('Hello World!What the fuck say');
// $section->addText('Hello World!What the fuck say');



        $filename = 'MyFile.docx';

                $process =  new \PhpOffice\PhpWord\TemplateProcessor('Form\\phieutiepnhan.docx');
                 $process->setValue('Chutaisan',$Chutaisan);
                $process->setValue('Nguoinhap',Auth::user()->name);
                 $process->setValue('Bophan',$Bophan);
                $process->setValue('Ngaynhan',date('d-m-Y',strtotime(now())));
                   $process->setValue('Thoihan',date('d-m-Y',strtotime($Ngaydangky)));
                $process->saveAs('Form\\Formdaxuat\\'.$filename);
                $phpWord = \PhpOffice\PhpWord\IOFactory::load('Form\\Formdaxuat\\'.$filename);
                $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($process, 'Word2007');

              

                $objWriter->save($filename);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.$filename);
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));
flush();
readfile($filename);
unlink($filename); 
    }

    public function getImport(){
    	return view('Admin.Taisancanhan.Import');
    }
    public function postImport(Request $Request){
    		\Excel::load($Request->file,function($reader){
    		$reader->takeColumns(18)->each(function($sheet){
    			foreach($sheet->toArray() as $row){
    			 $Nhap =QuanlykhoModel::firstOrCreate($sheet->toArray());
    			 $Nhap->save();

    			}
    		});
    		});
    }

  
    public function postImportPB(Request $Request){
        ;
            \Excel::load($Request->file,function($reader){
                    
                $detail = $reader->get(array('a','d','e','f','h','sl','g','nguoiphutrach','bophan','vitri','ngaynhan'));
                $MVTTT1 = \DB::table("tsphongban")->select('MVT')->orderBy('MVT','DESC')->get()->first();
                $MVTTT = \DB::table("khotong")->select('MVT')->orderBy('MVT','DESC')->get()->first();
                if($MVTTT1->MVT > $MVTTT->MVT)
                    $MVTTT =  \DB::table("tsphongban")->orderBy('MVT','DESC')->get()->first();
                else
                     $MVTTT =   \DB::table("khotong")->orderBy('MVT','DESC')->get()->first();
                $MTBtt1 = \DB::table('khotong')->select('MTB')->orderBy('MTB','DESC')->get()->first();
                 $MTBtt2 = \DB::table('tsphongban')->select('MTB')->orderBy('MTB','DESC')->get()->first();

                $MTBtt = \DB::table('tsphongban')->orderBy('MTB','DESC')->get();
                if($MTBtt->isEmpty())
                    $MTBtt=1000000000;
                else{
                    if($MTBtt2 > $MTBtt1)
                    $MTBtt=\DB::table('tsphongban')->select('MTB')->orderBy('MTB','DESC')->get()->first();
                    else
                          $MTBtt=\DB::table('khotong')->select('MTB')->orderBy('MTB','DESC')->get()->first();
                     
                }
                foreach ($detail as $key ) {
                   $checkTen1 =  \DB::table('khotong')->select('MVT','Hinh')->where('Ten',$key->d)->get();
                     $checkTen2 = \DB::table('tsphongban')->select('MVT','Hinh')->where('Ten',$key->d)->get();
                    if(($key->sl) >  1)
                    {  
                        ++$MVTTT->MVT;
                      
                        for($i=0 ; $i< $key->sl; $i++)
                        {   if($checkTen2->isNotEmpty() )
                            {
                            echo $checkTen2[0]->MVT;
                            $nhap = new TaiSanPhongBanModel;
                            
                            $nhap->MVT = $checkTen2[0]->MVT;

                            $nhap->MTB = ++$MTBtt->MTB;
                            $nhap->Ten = $key->d;
                            $nhap->Thongso = $key->e;
                            $nhap->Hinh = $checkTen2[0]->Hinh;
                            $nhap->Congty = $key->g;
                            $nhap->Sl = 1;
                            $nhap->Ngaynhan = $key->ngaynhan;
                            $nhap->Nguoiphutrach = $key->nguoiphutrach;
                            $nhap->Bophan = $key->bophan;
                            $nhap->Location = $key->vitri;
                            $nhap->dvt = $key->h;
                            $nhap->Trangthai = 0;
                            $nhap->Nguoithuchien = Auth::user()->name;
                            $nhap->save();
                            }
                            elseif($checkTen1->isNotEmpty()){
                                   dd($checkTen1);
                                    $nhap = new TaiSanPhongBanModel;
                             
                            $nhap->MVT = $checkTen1[0]->MVT;
                            $nhap->MTB = ++$MTBtt->MTB;
                            $nhap->Ten = $key->d;
                            $nhap->Thongso = $key->e;
                            $nhap->Hinh = $checkTen1[0]->Hinh;
                            $nhap->Congty = $key->g;
                            $nhap->Sl = 1;
                            $nhap->Ngaynhan = $key->ngaynhan;
                            $nhap->Nguoiphutrach = $key->nguoiphutrach;
                            $nhap->Bophan = $key->bophan;
                            $nhap->Location = $key->vitri;
                            $nhap->dvt = $key->h;
                            $nhap->Trangthai = 0;
                            $nhap->Nguoithuchien = Auth::user()->name;
                            $nhap->save();
                            }else{
                            $nhap = new TaiSanPhongBanModel;
                            $nhap->MVT = $MVTTT->MVT;
                            $nhap->MTB = ++$MTBtt->MTB;
                            $nhap->Ten = $key->d;
                            $nhap->Thongso = $key->e;
                            $nhap->Hinh = $key->f;
                            $nhap->Congty = $key->g;
                            $nhap->Sl = 1;
                            $nhap->Ngaynhan = $key->ngaynhan;
                            $nhap->Nguoiphutrach = $key->nguoiphutrach;
                            $nhap->Bophan = $key->bophan;
                            $nhap->Location = $key->vitri;
                            $nhap->dvt = $key->h;
                            $nhap->Trangthai = 0;
                            $nhap->Nguoithuchien = Auth::user()->name;
                            $nhap->save();}
                      
                        }
                        
                    }
                    else{
                       if($checkTen2->isNotEmpty() )
                            {
                            echo $checkTen2[0]->MVT;
                            $nhap = new TaiSanPhongBanModel;
                            
                            $nhap->MVT = $checkTen2[0]->MVT;

                            $nhap->MTB = ++$MTBtt->MTB;
                            $nhap->Ten = $key->d;
                            $nhap->Thongso = $key->e;
                            $nhap->Hinh = $checkTen2[0]->Hinh;
                            $nhap->Congty = $key->g;
                            $nhap->Sl = 1;
                            $nhap->Ngaynhan = $key->ngaynhan;
                            $nhap->Nguoiphutrach = $key->nguoiphutrach;
                            $nhap->Bophan = $key->bophan;
                            $nhap->Location = $key->vitri;
                            $nhap->dvt = $key->h;
                            $nhap->Trangthai = 0;
                            $nhap->Nguoithuchien = Auth::user()->name;
                            $nhap->save();
                            }
                            elseif($checkTen1->isNotEmpty()){
                    
                                    $nhap = new TaiSanPhongBanModel;
                             
                            $nhap->MVT = $checkTen1[0]->MVT;
                            $nhap->MTB = ++$MTBtt->MTB;
                            $nhap->Ten = $key->d;
                            $nhap->Thongso = $key->e;
                            $nhap->Hinh = $checkTen1[0]->Hinh;
                            $nhap->Congty = $key->g;
                            $nhap->Sl = 1;
                            $nhap->Ngaynhan = $key->ngaynhan;
                            $nhap->Nguoiphutrach = $key->nguoiphutrach;
                            $nhap->Bophan = $key->bophan;
                            $nhap->Location = $key->vitri;
                            $nhap->dvt = $key->h;
                            $nhap->Trangthai = 0;
                            $nhap->Nguoithuchien = Auth::user()->name;
                            $nhap->save();
                            }else{




                          $nhap = new TaiSanPhongBanModel;
                            $nhap->MVT = ++$MVTTT->MVT;
                            $nhap->MTB = ++$MTBtt->MTB;
                            $nhap->Ten = $key->d;
                            $nhap->Thongso = $key->e;
                            $nhap->Hinh = $key->f;
                            $nhap->Congty = $key->g;
                            $nhap->Sl = 1;
                            $nhap->Ngaynhan = $key->ngaynhan;
                            $nhap->Nguoiphutrach = $key->nguoiphutrach;
                            $nhap->Bophan = $key->bophan;
                            $nhap->Location = $key->vitri;
                            $nhap->dvt = $key->h;
                             $nhap->Trangthai = 0;
                            $nhap->Nguoithuchien = Auth::user()->name;
                            $nhap->save();
                      
                        }
                    }
                    
                }
            
               
            
          
            });
            return ' OK';
    }
}
