<?php

namespace App\CustomerProvider;

use Illuminate\Database\Eloquent\Model;

class QuanlykhoModel extends Model
{
    protected $table = 'khotong';
    protected $dates = [
    	'Ngaymua','Ngaynhap'
    ];
    protected $fillable = [
    	'mvt',
    	'mtb',
    	'ten',
    	'thongso',
    	'hinh',
    	'ngaynhap',
    	'nguoiphutrach',
    	'congty',
    	'sl',
    	'trangthai',
    	'dvt',
    	'sohopdong',
    	'nguoimua',
    	'ngaymua',
    	'thoigianbh',
    	'thoigiankh',
    	'giatri',
    	'giatriconlai',
    ];
}
