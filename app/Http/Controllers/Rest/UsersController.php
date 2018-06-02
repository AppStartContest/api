<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RobinMarechal\RestApi\Rest\RestResponse;

class UsersController extends Controller
{
    public function auth(Request $request)
    {
        $all = $request->json()->all();
        $user = User::where('username', $all['username'])->first();
        if ($user && Hash::check($all['password'], $user->password)) {
            return RestResponse::make($user, 200)->toJsonResponse();
        }

        return RestResponse::make(null, 404)->toJsonResponse();
    }


    public function register(Request $request)
    {
        $all = $request->json()->all();
        $all['password'] = Hash::make($all['password']);

        $user = User::create($all);

        return RestResponse::make($user, 201)->toJsonResponse();
    }


    public function post(): RestResponse
    {
        return RestResponse::make("Creating a user this way is forbidden. See register route.", 403);
    }
}