<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function createToken(Request $request){
        $data=['email' => $request->email, 'password' => $request->password];
        if(Auth::attempt($data)){
            $user=User::where("email", $request->email)->first();
            $token=$user->createToken("api-token")->plainTextToken;
            return response()->json(["token"=>$token], 201);
        }else{
            return response()->json(["error"=>"Authentication failed"], 401);
        }
    }
    public function createUser(Request $request){
        $user=new User();
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->name=$request->name;
        $user->save();
        return response()->json(["msg"=>"The user has been created"], 201);
    }
}

//2|df9EPwEQ99OEqBQFhxCnJauMfubwU2bQoHVU98SF48247dc3