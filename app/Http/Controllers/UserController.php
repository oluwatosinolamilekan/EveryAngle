<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if(!Auth::attempt($credentials)) {
            return $this->invalidCredentials();
        }
        $user = $request->user();
        return $this->returnToken($user, $request);
    }

    public function show(Request $request)
    {
        return new UserResource($request->user());
    }

    /**
     * @return JsonResponse
     */
    private function invalidCredentials(): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'email and or pasword does not match'
        ], 401);
    }

    /**
     * @return JsonResponse
     */
    protected function returnToken($user, $request = null): JsonResponse
    {
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request && $request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

}
