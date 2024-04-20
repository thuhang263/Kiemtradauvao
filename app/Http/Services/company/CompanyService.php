<?php

namespace App\Http\Services\company;

use App\Models\Company;

use Illuminate\Support\Facades\Session;

class CompanyService
{

    public function getAll()
    {
        return Company::orderbyDesc('id')->paginate(15);
    }

    public function create($request)
    {
        try{
            Company::create(array(
                'name' =>(string) $request->input('name'),
                'code' =>(string) $request->input('code'),
                'address' =>(string) $request->input('address'),
            ));
            Session::flash('success','Thêm thành công');
        }catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $company):bool
    {
        $company->name = (string)$request->input('name');
        $company->code = (string)$request->input('code');
        $company->address = (string)$request->input('address');
        $company ->save();
        Session::flash('success','Cập nhật thành công');
        return true;
    }
    public function destroy($request)
    {
        $id = (int) $request -> input('id');
        $company = Company::where('id', $id)->first();
        if($company){
            return  Company::where('id', $id)->delete();
        }
        return false;
    }

}
