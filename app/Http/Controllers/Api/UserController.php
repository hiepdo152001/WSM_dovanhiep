<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this-> userservice = $userService;
    }

    /**
     * Create User
     * @param \App\Http\Requests\RegisterRequest $userequest
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function RegisterAccount(RegisterRequest $userequest)
    {
        try {
           
            $user = User::create([
                'email'=> $userequest->email,
                'name' => $userequest->name,
                'password' => Hash::make($userequest->password),
            ]);
            return response()->json([
                'status' =>  true,
                'message' => 'User Create Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' =>false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    /**
     * Update User
     * @param \App\Http\Requests\UserRequest $userequest
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function updateUser(UserRequest $userequest)
    {
        try {
            $user=$this->getCurrentLoggedIn();
            if (isset($user)) {
                $this->userservice->editUser($user, $userequest->input());
            } else {
                abort(401);
            }
            return response()->json([
                'status' => true,
                'message' => 'update successfull'
            ]);
        } catch(\Throwable $th) {
            return response()->json([
             'status' =>  false,
             'message' => $th->getMessage(),
            ], 500);
        };
    }
    public function getUserbyId($id)
    {
        try {
            $user=$this->userservice->getUserbyId($id);
            return response()->json([
               'data' => $user

            ]);
        } catch(\Throwable $th) {
            return response()->json([
               'status' =>  false,
               'message' => $th->getMessage(),
              ], 500);
        };
    }

    public function getUserLoggin()
    {
        try {
            $user=$this->getCurrentLoggedIn();
            if (isset($user)) {
                return response()->json([
                    'data' => $user
                 ]);
            }
        } catch(\Throwable $th) {
            return response()->json([
               'status' =>  false,
               'message' => $th->getMessage(),
              ], 500);
        };
    }
    public function deleteUserById($id){
       try{
        $user=User::find($id)->first();
        if(isset($user)){
        $user->delete();
        }
        return response()->json([
            'message' => 'delete user successfull',
            'user delete' => $user,
         ],200);

       }catch(\Throwable $th){
        return response()->json([
            'status' =>  false,
            'message' => $th->getMessage(),
           ], 500);
       }
    }
    public function loggin(Request $registerRequest){
        try{
            $email=$registerRequest->email;
            $user=User::where('email',$email)->first();
            if(!$user){
                    return response()->json([
                        'message' => 'email not isset',
                        'status' => false
                     ],500);
            }
            if(!Auth::attempt(['email' => $registerRequest->email, 'password' => $registerRequest->password])){
                return response()->json([
                    'message' => 'password not match',
                    'status' => false
                 ],500);
            }

            elseif(Auth::attempt(['email' => $registerRequest->email, 'password' => $registerRequest->password])){
                $user->tokens()->delete();
                return response()->json([
                    'message' => 'loggin successfull',
                    'status' => true,
                    'token'=>$user->createToken("API TOKEN")->plainTextToken,
                 ],200);
            }

        }catch(\Throwable $th){
            return response()->json([
                'status'=> true,
                'message' => $th->getMessage(),
            ],500);
        }

    }
    public function logout(){
    try {
        $user=$this->getCurrentLoggedIn();
        if($user){
            $user->tokens()->delete();
        }
        return response()->json([
            'status' => true,
            'message' => 'logout successfull'
        ],200);
    } catch(\Throwable $th) {
        return response()->json([
            'status'=> true,
            'message' => $th->getMessage(),
        ], 500);

    }
}
public function changePassword(Request $request)
    {
        try {

            $user = $this->getCurrentLoggedIn();

            if (isset($user)) {
                if (!Hash::check($request->old_password, $user->password)) {
                    return response()->json([
                        'status' => 422,
                        'message' => 'Mật khẩu cũ không chính xác'
                    ], 422);
                }

                $this->userservice->newPassword($user->email, $request->new_password);
            } else {
                abort(401);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $user
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);

        }
    }

}


