<?php

namespace App\CustomerProvider;

use Illuminate\Database\Eloquent\Model;

class SoTrungThuongModel extends Model
{
    protected $table="sotrungthuong";
    protected  $primaryKey = 'Ngay';
    protected $keyType = 'datetime';
     protected $dates = [
    	'Ngay',
    ];
    protected $dateFormat = 'Y-m-d H:i:s';
}
