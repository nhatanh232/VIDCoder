<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DSNVDKA extends Model
{	
   protected $table = "DSNVDKA";
   protected $dateFormat = 'd-m-Y';
   // protected $dates = ['Startdate', 'Enddate'];
  protected $cats = [
  	'Startdate' => 'date_format:d/m/Y',
  	'Enddate' => 'date_format:d/m/Y',
  ];
}
