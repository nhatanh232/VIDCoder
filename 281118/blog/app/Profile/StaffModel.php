<?php

namespace App\Profile;

use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    protected $table= 'STAFF';
    protected $primaryKey = 'Staff_ID';
   protected $keyType = 'string';
}
