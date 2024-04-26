<?php

namespace App\Http\Services\department;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Support\Facades\Session;

class DepartmentService
{
    public function getParent()
    {
        return Department::where('parent_department_id',0)->get();
    }
    public function show()
    {
        return Department::select('name','id')
            ->where('parent_department_id',0)
            -> orderbyDesc('id')
            ->get();
    }
    public function getCompany()
    {
        return Company::get();
    }
    public function getAll()
    {
        return Department::orderbyDesc('id')->paginate(15);
    }

    public function create($request)
    {
        try{
            Department::create(array(
                'code' =>(string) $request->input('code'),
                'name' =>(string) $request->input('name'),
                'parent_department_id' =>(int)$request->input('parent_department_id'),
                'company_id' =>(string) $request->input('company_id'),
            ));
            Session::flash('success','Thêm thành công');
        }catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $department):bool
    {

        $department->code = (string)$request->input('code');
        $department->name = (string)$request->input('name');
        if($request->input('parent_department_id') != $department->id){
            $department->department_parent_id = (string)$request->input('parent_department_id');
        }
        $department->company_id = (string)$request->input('company_id');
        $department ->save();
        Session::flash('success','Cập nhật thành công');
        return true;
    }
    public function destroy($request)
    {
        $id = (int) $request -> input('id');
        $department = Department::where('id', $id)->first();
        if($department){
            return  Department::where('id', $id)->orWhere('parent_department_id',$id)->delete();
        }
        return false;
    }

}
