<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */

    public function register(RegisterUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['id'] = $user->id;
        $success['name'] = $user->name;
        $success['email'] = $user->email;

        return response()->json($success);
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */

    public function login(LoginUserRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['id'] = $user->id;
            $success['name'] = $user->name;
            $success['email'] = $user->email;

            return response()->json($success);

        } else {

            return response()->json(["message" => "incorrect email or password"], 401);

        }

    }
}
