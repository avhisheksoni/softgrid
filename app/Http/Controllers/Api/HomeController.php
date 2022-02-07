<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RequestApis;

use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    public function getUsers(){
        $user =  User::all();
       
        $user_id = request('user_id');
        if(isset($user_id)){
            setRequestApis('get-user',$user_id);
            return response()->json(['success'=>true,'data' => $user],200);
        }else{
            return response()->json(['success'=>false,'error' => ['user_id' => 'User id  is required']],400);
        }
    }
    
    public function getUserApisRequest(Request $request){
        
        $validator = Validator::make($request->all(), [
            'user_id'  => 'required|numeric',
            'date'     => 'nullable|date_format:Y-m-d',
            'time'     => 'nullable|date_format:H:i',
        ]);
        if ($validator->fails()) {
            return response()->json(['success'=>false, 'error'=>$validator->errors()],400);
        }
        $result = RequestApis::where('user_id',$request->user_id);
        if(isset($request->date)){
            $result = $result->whereDate('date_time',$request->date);
        }
        if(isset($request->time)){
            $result = $result->whereTime('date_time',date('H:i:s',strtotime($request->time)));
        }
        $result = $result->get();
        return response()->json(['success'=>true,'data' => $result],200);
    }
}
