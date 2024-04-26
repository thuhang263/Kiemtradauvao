<?php

namespace App\Http\Services\project;

use App\Models\Company;
use App\Models\Project;
use Illuminate\Support\Facades\Session;

class ProjectService
{
    public function getCompany()
    {
        return Company::get();
    }
    public function getAll()
    {
        return Project::orderbyDesc('id')->paginate(15);
    }

    public function create($request)
    {
        try{
            Project::create(array(
                'code' =>(string) $request->input('code'),
                'project_name' =>(string) $request->input('project_name'),
                'description' =>(int)$request->input('description'),
                'company_id' =>(string) $request->input('company_id'),
            ));
            Session::flash('success','Thêm thành công');
        }catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $project):bool
    {

        $project->code = (string)$request->input('code');
        $project->project_name = (string)$request->input('project_name');
        $project->description = (string)$request->input('description');
        $project->company_id = (string)$request->input('company_id');
        $project ->save();
        Session::flash('success','Cập nhật thành công');
        return true;
    }
    public function destroy($request)
    {
        $id = (int) $request -> input('id');
        $project = Project::where('id', $id)->first();
        if($project){
            return  Project::where('id', $id)->delete();
        }
        return false;
    }

}
