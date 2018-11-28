<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhLyModel extends Model
{
    protected $table='taisantlcn';
    protected $cats = [
    	'Ngay' => 'date_format:d-m-Y',
    ];
}
