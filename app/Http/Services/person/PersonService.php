<?php

namespace App\Http\Services\person;


use App\Models\User;
use App\Models\Company;
use App\Models\Person;
use Illuminate\Support\Facades\Session;

class PersonService
{
    public function getUser()
    {
        return User::get();
    }
    public function getCompany()
    {
        return Company::get();
    }
    public function getAll()
    {
        return Person::orderbyDesc('id')->paginate(15);
    }

    public function create($request)
    {
        try{
            Person::create(array(
                'full_name' =>(string) $request->input('full_name'),
                'gender' =>(string) $request->input('gender'),
                'birthdate' =>(string) $request->input('birthdate'),
                'phone_number' =>(string) $request->input('phone_number'),
                'address' =>(string) $request->input('address'),
                'user_id' =>(string) $request->input('user_id'),
                'company_id' =>(string) $request->input('company_id'),
            ));
            Session::flash('success','Thêm thành công');
        }catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $person):bool
    {
        $person->full_name = (string)$request->input('full_name');
        $person->gender = (string)$request->input('gender');
        $person->birthdate = (string)$request->input('birthdate');
        $person->phone_number = (string)$request->input('phone_number');
        $person->address = (string)$request->input('address');
        $person->user_id = (string)$request->input('user_id');
        $person->company_id = (string)$request->input('company_id');
        $person ->save();
        Session::flash('success','Cập nhật thành công');
        return true;
    }
    public function destroy($request)
    {
        $id = (int) $request -> input('id');
        $person = Person::where('id', $id)->first();
        if($person){
            return  Person::where('id', $id)->delete();
        }
        return false;
    }

}
