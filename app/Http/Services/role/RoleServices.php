<?php

namespace App\Http\Services\role;

use App\Models\Role;
use Illuminate\Support\Facades\Session;

class RoleServices
{

    public function getAll()
    {
        return Role::orderbyDesc('id')->paginate(15);
    }

    public function create($request)
    {
        try{
            Role::create(array(
                'role' =>(string) $request->input('role'),
                'description' =>(string) $request->input('description'),
            ));
            Session::flash('success','Thêm thành công');
        }catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $role):bool
    {
        $role->code = (string)$request->input('code');
        $role->description = (string)$request->input('description');
        $role ->save();
        Session::flash('success','Cập nhật Quốc gia thành công');
        return true;
    }
    public function destroy($request)
    {
        $id = (int) $request -> input('id');
        $role = Role::where('id', $id)->first();
        if($role){
            return  Role::where('id', $id)->delete();
        }
        return false;
    }

}
