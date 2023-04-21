<?php 
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService{


    public function __construct(User $user ){
        $this->user=$user;
    }

 public function editUser(object $user,array $request){
           $user->update($request);
 }
 public function getUserbyId( $id){
    $user=User::find($id)->first();
    return $user;
 }
 public function newPassword(string $email, string $password)
    {
        return $this->user->where('email', $email)->update([
            'password' => Hash::make($password)
        ]);
    }

 }



?>