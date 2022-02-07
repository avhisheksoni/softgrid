<?php
use App\Models\RequestApis;

if (!function_exists('setRequestApis')) {
    function setRequestApis($api_name,$user_id)
    {
        RequestApis::create(['api_name' => $api_name,'user_id' =>  $user_id,'date_time' => date('Y-m-d H:i')]);
    }
}