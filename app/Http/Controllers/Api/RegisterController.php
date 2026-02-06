<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
 public function __invoke(Request $request)
 {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:199',
        'email' => 'required|string|email|max:199|unique:users',
        'password' => 'required|string|min:6'
    ]);
     if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);
    if ($user){
        return response()->json([
            'success' => true,
            'data' => $user
        ], 201);}
 }
}