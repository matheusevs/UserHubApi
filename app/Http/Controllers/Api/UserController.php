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
    public function get(Request $request)
    {
        try {
            
            $users = User::all();
            return response()->json($users);
        
        } catch (Exception $e) {
        
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 500);

        }
    }

    /**
     * Creates a new user
     *
     * @param Request $request Request with user data
     * @return \Illuminate\Http\JsonResponse New user data
     */
    public function create(Request $request)
    {
        try {

            $user = new User();
            $userExists = $user::where('email', $request->email)->exists();
            
            if ($userExists) {
                return response()->json([
                    'error' => true,
                    'message' => 'Email ja existe',
                ], 409);
            }
            
            $user->name = $request->name;
            $user->telephone = $request->telephone;
            $user->email = $request->email;
            $user->save();
            return response()->json($user);

        } catch (Exception $e) {
            
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 500);

        }
    }

    /**
     * Retrieves a user by ID
     *
     * @param int $id User ID
     * @return \Illuminate\Http\JsonResponse User data or error message
     */
    public function edit($id)
    {
        try {

            if ($id && is_numeric($id)) {

                $user = User::find($id);
                if ($user) {
                    return response()->json($user);
                }

                return response()->json([
                    'error' => true,
                    'message' => 'Usuário não encontrado',
                ], 404);
            }

            return response()->json([
                'error' => true,
                'message' => 'ID inválido',
            ], 400);

        } catch (Exception $e) {

            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 500);
            
        }
    }

    /**
     * Deletes a user
     * 
     * @param int $id User id
     * @return \Illuminate\Http\JsonResponse Deleted user data or error message
     */
    public function delete($id)
    {
        try {

            if ($id && is_numeric($id)) {

                $user = User::find($id);
                if ($user) {
                    $user->delete();
                    return response()->json($user);
                } 

                return response()->json([
                    'error' => true,
                    'message' => 'Usuário não encontrado',
                ], 404);

            }

            return response()->json([
                'error' => true,
                'message' => 'ID inválido',
            ], 400);

        } catch (Exception $e) {
        
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 500);

        }
    }

    /**
     * Updates a user
     * 
     * @param Request $request Request with user data
     * @param int $id User id
     * @return \Illuminate\Http\JsonResponse Updated user data or error message
     */
    public function update(Request $request, $id)
    {
        try {

            if ($id && is_numeric($id)) {

                $user = User::find($id);
                if ($user) {
                    $user->update($request->all());
                    return response()->json($user);
                } 

                return response()->json([
                    'error' => true,
                    'message' => 'Usuário não encontrado',
                ], 404);

            }

            return response()->json([
                'error' => true,
                'message' => 'ID inválido',
            ], 400);

        } catch (Exception $e) {
        
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 500);

        }
    }

}
