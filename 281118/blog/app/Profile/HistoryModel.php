<?php

namespace App\Profile;

use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    protected $table = 'History';
    protected $primaryKey = 'Staff_ID';
    protected $keyType = 'string';
}
