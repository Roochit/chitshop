<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    protected $table = 'tbl_logs';
    protected $primaryKey = 'log_id';
    protected $fillable = ['user_id', 'action', 'detail', 'ip_address'];
}
