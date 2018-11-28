<?php

namespace App\CustomerProvider;

use Illuminate\Database\Eloquent\Model;

class TaiSanPhongBanModel extends Model
{
    protected $table = 'tsphongban';
    protected $dates = [
    	'Ngaynhan',
    ];
}
