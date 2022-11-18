<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(Request $request){

        $credentials = $request->only(['phone',$request->phone,'password',$request->password]);
   
         $validator = Validator::make($credentials,[
           'phone'=>'required|min:11',
           'password'=>'required',
          ]);
   
          if($validator->fails())return validatin_errorr($validator->errors());
   
          if(auth()->guard('admin')->attempt($credentials)) {
   
            $admin = Admin::select('admins.*')->find(auth()->guard('admin')->user()->id);
           $data['token'] =  $admin->createToken('MyApp')-> accessToken;
          $data['name'] = $admin->name;
          return success_response($data,__('message.user.manage.login'));
   
       } else {
           return error_response(__('message.user.manage.not_found'),401);
       }
   
   
   
       }
   
   
   
       public function logout (Request $request){
           try{
               if ($request->user()) { 
                   $request->user()->tokens()->delete();
               }
           
               return success_response([],__('message.user.manage.logout'));
           }catch(Exception $e){
               return error_response([],__('message.user.manage.not_found'),401);
           }
       }
}
