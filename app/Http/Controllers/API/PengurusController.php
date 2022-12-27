<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\Pengurus;
use Illuminate\Support\Facades\Validator;

class PengurusController extends Controller
{
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errprs' => $validation->errors(),
            ], 400);
        }

        $credentials = request(['email', 'password']);

        if (!auth("pengurus")->attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Pengurus::where('email', $request->email)->first();

        return response()->json([
            'message' => 'Authorized',
            'data' => [
                'user' => $user,
                'token' => $user->createToken('pengurus')->plainTextToken,
            ],
        ], 200);
    }

    public function logout(Request $request)
    {
    }
}
