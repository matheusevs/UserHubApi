<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Returns a list with all users
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsers(Request $request)
    {
        try {
            
            $users = User::all();
            return response()->json($users);
        
        } catch (\Exception $e) {
        
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);

        }
    }

    /**
     * Creates a new user
     *
     * @param Request $request Request with user data
     * @return \Illuminate\Http\JsonResponse
     */
    public function insertUser(Request $request)
    {

        try {

            $user = new User();
            $user->name = $request->name;
            $user->telephone = $request->telephone;
            $user->email = $request->email;
            $user->save();
            return response()->json($user);

        } catch (\Exception $e) {
        
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);

        }
    }

    /**
     * Deletes a user
     *
     * @param Request $request Request with user id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser(Request $request)
    {
        //
    }

    /**
     * Updates an existing user
     *
     * @param Request $request Request with user data and user id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUpdateUser(Request $request)
    {
        
    }
}
