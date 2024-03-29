<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class userController extends Controller
{
    public function register(Request $request){
          $validation = Validator::make($request->all(), [
            "name"=> "required",   
            "email"=> "required|email",
            "password"=> "required",
            "c_password"=> "required|same:password",
          ]);
          if($validation->fails()){
            return response()->json([$validation->errors() ,202 ]);
          }
           $allData = $request->all();
           $allData['password']= bcrypt($allData['password']);
           $user = User::create($allData);
            $resArr=[] ; 
            $resArr['token']=$user->createToken('api-application')->accessToken;
            $resArr['name']=$user->name ;
            return response()->json([$resArr ,200 ]);

    }
    public function login(Request $request){

        if(Auth::attempt([
            'email'=> $request->email,
            'password'=> $request->password
        ])){
           $user=Auth::user();
           $resArr=[] ; 
           $resArr['token']=$user->createToken('api-application')->accessToken;
           $resArr['name']=$user->name ;
           $resArr['role'] = $user->role;
           return response()->json([$resArr ,200 ]);
         }else{
            return response()->json(['error'=>'Unauthorized Access'], Response::HTTP_UNAUTHORIZED);
         }
        }

        public function logout(Request $request){
            $token=$request->user()->token(); 
            $token->revoke();
            $responce=["message"=>"You have successfully logout !"] ; 
            return response()->json($responce ,200);

        }
}
