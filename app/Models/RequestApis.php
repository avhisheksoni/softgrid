<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestApis extends Model
{
    use HasFactory;
    protected $table ='request_apis';
    public $fillable = [
        'api_name',
        'user_id',
        'date_time'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
