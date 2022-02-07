<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RequestApis;
use DB;
class DashboardController extends Controller
{
    public function index(){
        $users = User::all(); 
        $requestApis = RequestApis::select('api_name',DB::raw('count(id) as cont'))->groupBy('api_name')->get();

        $apisName = RequestApis::select('api_name')->distinct('api_name')->get();

        return view('home',compact('users','requestApis','apisName'));
    }

    public  function requestApisHistory($date){
        return RequestApis::with('user')->whereDate('date_time',$date)->get();
    }

}
