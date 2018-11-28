<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoatDongModel extends Model
{
    protected $table = 'hoatdong';
    protected $cats = [
    	'Ngay' => 'date_format:d-m-Y',
    ];
}
