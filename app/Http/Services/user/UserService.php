<?php

namespace App\Http\Services\user;


use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Role;

class UserService
{
    public function getRole()
    {
        return Role::get();
    }

    public function getAll()
    {
        return User::orderbyDesc('id')->paginate(15);
    }

    public function create($request)
    {
        try{
            User::create(array(
                'email' =>(string) $request->input('email'),
                'password' =>(string) $request->input('password'),
                'is_active' =>(string) $request->input('is_active'),
                'role' =>(string) $request->input('role'),
            ));
            Session::flash('success','Thêm user thành công');
        }catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $user):bool
    {
        $user->email = (string)$request->input('email');
        $user->password = (string)$request->input('password');
        $user->is_active = (string)$request->input('is_active');
        $user->role = (string)$request->input('role');
        $user ->save();
        Session::flash('success','Cập nhật user thành công');
        return true;
    }
    public function destroy($request)
    {
        $id = (int) $request -> input('id');
        $user = User::where('id', $id)->first();
        if($user){
            return  User::where('id', $id)->delete();
        }
        return false;
    }

}
