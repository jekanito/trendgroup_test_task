<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Login api function.
     */

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'    => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.'
            ]);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user->token = $user->createToken('myApp')->accessToken;
            return response()->json([
                'success' => true,
                'message' => 'User login successfully.',
                'data'    => $user
            ]);
        }
    }
}
