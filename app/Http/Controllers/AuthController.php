<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username'=>'string',
            'password'=>'string|'
        ]);

        if ($validator->fails())
            return response()->json(['error' => 'Unauthorized'], 401);



        $client = new Client();
        $response = $client->get('');
        $value = json_decode($response->getBody(), true);



//        $credentials = request(['email', 'password']);
//
//        if (! $token = auth()->attempt($credentials)) {
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }
//
//        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        auth()->user()->update(['access_token'=>'']);
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
