<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HonVietController extends Controller
{
     public function DatlichHonViet(){
     	return view('datlich.honviet.hop');
     }
}
