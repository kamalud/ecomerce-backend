<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class UserController extends Controller
{
    public function login(Request $request){

     $credentials = $request->only('phone','password');

      $validator = Validator::make($credentials,[
        'phone'=>'required|min:11',
        'password'=>'required',
       ]);

       if($validator->fails())return validatin_errorr($validator->errors());

       if(Auth::attempt($credentials)) {

        $user = Auth::user();
        $data['token'] =  $user->createToken('MyApp')-> accessToken;
       $data['name'] = $user->name;
       return success_response($data,__('message.user.manage.login'));

    } else {
        return error_response(__('message.user.manage.not_found'),401);
    }



    }


    public function register(Request $request){
     $credentials = $request->only('phone','password','email','name');
        $validator = Validator::make($credentials,[
            'name'=>'required|min:4',
            'phone'=>'required|min:11',
            'email'=>'required',
            'password'=>'required|min:8',
           ]);
    
           if($validator->fails())return validatin_errorr($validator->errors());

          try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
               ]);
               $data['user'] = $user;
               $data['token'] =  $user->createToken('MyApp')-> accessToken;
               
               return success_response($data,__('message.user.create.success'));
          }catch(Exception $e){
            return error_response(__('message.user.create.error'),401);
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
