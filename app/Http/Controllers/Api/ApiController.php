<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
   //POST[name,email,password]
    public function register(Request $r){
        //validation
        $r->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);
        //create user
        User::create([
            "name" => $r->name,
            "email" => $r->email,
            "password" => bcrypt($r->password)

            ]);
            return response()->json([
                "status" => "true",
                "message" => "User added successfully",
                "data" => []
             ]);

    }
    //POST[email,password]
     public function login(Request $r){
        //Validation
        $r->validate([
        "email" => "required|string|email",
        "password" => "required"
        ]);

        //Email check
        //$user is user obj
        $user = User::where("email", $r->email)->first();
        //Password check
        if(!empty($user)){
            if(Hash::check($r->password, $user->password)){
            $token = $user->createToken("mytoken")->accessToken;
              return response()->json([
                "status" => "true",
                "message" => "Login Successfull",
                "token" => $token,
                "data" => []

            ]);

            }
            else{
                  return response()->json([
                "status" => "false",
                "message" => "Password did not matched",
                "data" => []
            ]);
            }


        }
        else{
            return response()->json([
                "status" => "false",
                "message" => "User not exist",
                "data" => []
            ]);
        }

    }
    //GET[Auth:token]
     public function profile(){
        $userData = auth()->user();return response()->json([
                "status" => "true",
                "message" => "Profile information",
                "data" => $userData
            ]);

    }
     //GET[Auth:token]
     public function logout(){
        $token = auth()->user()->token();
        $token->revoke();
        return response()->json([
                "status" => "true",
                "message" => "user logout successfully"

            ]);

    }
}
