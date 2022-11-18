<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Seller;
class SellerController extends Controller
{
    public function login(Request $request){

        $credentials = $request->only(['phone',$request->phone,'password',$request->password]);
   
         $validator = Validator::make($credentials,[
           'phone'=>'required|min:11',
           'password'=>'required',
          ]);
   
          if($validator->fails())return validatin_errorr($validator->errors());
   
          if(auth()->guard('seller')->attempt($credentials)) {
   
           $seller = Seller::select('sellers.*')->find(auth()->guard('seller')->user()->id);
           $data['token'] =  $seller->createToken('MyApp')-> accessToken;
          $data['name'] = $seller->name;
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
