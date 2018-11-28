<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QLKhoModel extends Model
{
    protected $table ='qlkho';
    protected $dates =[
    	'Ngaynhan',
    	'Ngaytra'
    ];
}
