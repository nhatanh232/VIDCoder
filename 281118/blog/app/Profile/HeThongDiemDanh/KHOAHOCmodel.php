<?php

namespace App\Profile\HeThongDiemDanh;

use Illuminate\Database\Eloquent\Model;

class KHOAHOCmodel extends Model
{
    protected $table = 'KHOAHOC';
     protected $primaryKey = 'Class_ID';
    protected $keyType = 'string';
}
