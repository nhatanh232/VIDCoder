<?php

namespace App\CustomerProvider;

use Illuminate\Database\Eloquent\Model;

class HistoryNhapModel extends Model
{
    protected $table = 'historynhap';
    protected $date = [
    		'Ngaynhap','Ngaymua'
    ];
}
