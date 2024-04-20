<?php

namespace App\Http\Services\country;

use App\Models\Country;
use Illuminate\Support\Facades\Session;

class CountryService
{

    public function getAll()
    {
        return Country::orderbyDesc('id')->paginate(15);
    }

    public function create($request)
    {
        try{
            Country::create(array(
                'code' =>(string) $request->input('code'),
                'name' =>(string) $request->input('name'),
                'description' =>(string) $request->input('description'),
            ));
            Session::flash('success','Thêm Quốc gia thành công');
        }catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $country):bool
    {
        $country->code = (string)$request->input('code');
        $country->name = (string)$request->input('name');
        $country->description = (string)$request->input('description');
        $country ->save();
        Session::flash('success','Cập nhật Quốc gia thành công');
        return true;
    }
    public function destroy($request)
    {
        $id = (int) $request -> input('id');
        $country = Country::where('id', $id)->first();
        if($country){
            return  Country::where('id', $id)->delete();
        }
        return false;
    }

}
