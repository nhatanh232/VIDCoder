<?php

namespace App\Http\Controllers\Quantri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ThongBaoModel;
class ThongBaoController extends Controller
{
    public function Edit(){
    	return view('Quantri.ThongBaoEdit');

    }
    public function Add(Request $Request){
    		
    }

}
