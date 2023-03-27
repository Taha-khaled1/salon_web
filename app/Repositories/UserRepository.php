<?php
namespace App\Repositories;

use App\Contracts\UserInterface;
use App\Models\Article;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
//added
use Exception;

class UserRepository implements UserInterface
{

    public function updateParameters($request)
    {
        $update = array();
        $update['name'] = $request->name;
        $update['email'] = $request->email;
        $update['mobile'] = $request->mobile;

        return $update;
    }
    public function editName(Request $request)
    {
        $id = Auth::user()->id;
        $update=$this->updateParameters($request);
        User::where('id', $id)->update(
            $update
        );
    }

     public function editNameAndEmail(Request $request)
    {
           //unique:users,email,'.$u->email;
           $input['email'] = $request->email;
           // Must not already exist in the `email` column of `users` table
           $rules = array('email' => 'unique:users,email');

           $validator = Validator::make($input, $rules);
           if ($validator->fails()) {

               return false;
           }

           else
           {
               $id = Auth::user()->id;
               $update=$this->updateParameters($request);
               User::where('id', $id)->update(
                   $update
               );

               return true;
           }
    }

    public function changePassword(Request $request)
    {
        $oldPassword = Auth::user()->password;
        $oldPasswordFromRequest = $request->old_password;
        if (Hash::check($oldPasswordFromRequest,$oldPassword))
        {
            //return 'done';
            if($request->new_password==$request->confirm_password)
            {
               $new_password=$request->new_password;
               $id=Auth::user()->id;
               $user=User::find($id);
               $user->password=Hash::make($new_password);
               $user->save();
                return 'success';
            }
            else
            {
                return 'confirm';
            }

        }
        else
        {
            return 'error';
        }
    }

}
